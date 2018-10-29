<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/11/18
 * Time: 9:00 PM
 */

if (!function_exists('getLowestYearOfDesa')) {
    function getLowestYearOfDesa() {
        $desaIds = getMultipleDesaId();
        if (empty($desaIds)) $desaIds = array("false");
        $imploded = implode("', '", $desaIds);
        $sql = "SELECT MIN(tahun_lahir) as tahun from statistik_lahir_tahunan slt where slt.desa_id IN ('$imploded') and tahun_lahir is not null";
        $tahun_lahir = _fetchOneFromSql($sql);
        $tahun_lahir = @$tahun_lahir['tahun'];

        $sql = "SELECT MIN(tahun_wafat) as tahun from statistik_kematian_tahunan slt where slt.desa_id IN ('$imploded') and tahun_wafat is not null";
        $tahun_wafat = _fetchOneFromSql($sql);
        $tahun_wafat = @$tahun_wafat['tahun'];

        $sql = "SELECT MIN(tahun_pindah) as tahun from statistik_pindah_tahunan slt where slt.desa_id IN ('$imploded') and tahun_wafat is not null";
        $tahun_pindah = _fetchOneFromSql($sql);
        $tahun_pindah = @$tahun_pindah['tahun'];

        $sql = "SELECT MIN(tahun_datang) as tahun from statistik_pendatang_tahunan slt where slt.desa_id IN ('$imploded') and tahun_datang is not null";
        $tahun_datang = _fetchOneFromSql($sql);
        $tahun_datang = @$tahun_datang['tahun'];

        $smallest = $tahun_lahir;
        if (($smallest === null || $tahun_wafat < $smallest) && $tahun_wafat !== null) {
            $smallest = $tahun_wafat;
        }
        if (($smallest === null || $tahun_pindah < $smallest) && $tahun_pindah !== null) {
            $smallest = $tahun_pindah;
        }

        if (($smallest === null || $tahun_datang < $smallest) && $tahun_datang !== null) {
            $smallest = $tahun_datang;
        }

        return $smallest;
    }
}

if (!function_exists('getHighestYearOfDesa')) {
    function getHighestYearOfDesa() {
        $desaIds = getMultipleDesaId();
        if (empty($desaIds)) $desaIds = array("false");
        $imploded = implode("', '", $desaIds);
        $sql = "SELECT MAX(tahun_lahir) as tahun from statistik_lahir_tahunan slt where slt.desa_id IN ('$imploded') and tahun_lahir is not null";
        $tahun_lahir = _fetchOneFromSql($sql);
        $tahun_lahir = @$tahun_lahir['tahun'];

        $sql = "SELECT MAX(tahun_wafat) as tahun from statistik_kematian_tahunan slt where slt.desa_id IN ('$imploded') and tahun_wafat is not null";
        $tahun_wafat = _fetchOneFromSql($sql);
        $tahun_wafat = @$tahun_wafat['tahun'];

        $sql = "SELECT MAX(tahun_pindah) as tahun from statistik_pindah_tahunan slt where slt.desa_id IN ('$imploded') and tahun_wafat is not null";
        $tahun_pindah = _fetchOneFromSql($sql);
        $tahun_pindah = @$tahun_pindah['tahun'];

        $sql = "SELECT MAX(tahun_datang) as tahun from statistik_pendatang_tahunan slt where slt.desa_id IN ('$imploded') and tahun_datang is not null";
        $tahun_datang = _fetchOneFromSql($sql);
        $tahun_datang = @$tahun_datang['tahun'];

        $biggest = $tahun_lahir;
        if ($biggest === null || $tahun_wafat > $biggest) {
            $biggest = $tahun_wafat;
        }
        if ($biggest === null || $tahun_pindah > $biggest) {
            $biggest = $tahun_pindah;
        }
        if ($biggest === null || $tahun_datang > $biggest) {
            $biggest = $tahun_datang;
        }

        return $biggest;
    }
}

if (!function_exists('getRangeYearOfDesa')) {
    function getRangeYearOfDesa($step=10) {
        $highest = getHighestYearOfDesa();
        $lowest = getLowestYearOfDesa();
        $rangeYear = array();
        for ($i = $highest; $i >= $lowest ;) {
            $rangeYear[] = $i;
            $i -= $step;
        }
        $rangeYear[count($rangeYear)-1] = $lowest;
        return $rangeYear;
    }
}

if (!function_exists('getDataLampid')) {
    function getDataLampid($yearBottom, $yearTop) {
        $desaIds = getMultipleDesaId();
        if (!$yearBottom) $yearBottom = getLowestYearOfDesa();
        if (!$yearTop) $yearTop = getHighestYearOfDesa();
        if (empty($desaIds)) $desaIds = array("false");
        $imploded = implode("', '", $desaIds);
        $sql = "SELECT tahun_lahir as tahun, sum(jumlah) as jumlah from statistik_lahir_tahunan slt where slt.desa_id IN ('$imploded') and tahun_lahir is not null and tahun_lahir between $yearBottom and $yearTop group by tahun_lahir";
        $data_lahirs = _fetchMultipleFromSql($sql);
        $sql = "SELECT tahun_wafat as tahun, sum(jumlah) as jumlah from statistik_kematian_tahunan slt where slt.desa_id IN ('$imploded') and tahun_wafat is not null and tahun_wafat between $yearBottom and $yearTop group by tahun_wafat";
        $data_wafats = _fetchMultipleFromSql($sql);
        $sql = "SELECT tahun_pindah as tahun, sum(jumlah) as jumlah from statistik_pindah_tahunan slt where slt.desa_id IN ('$imploded') and tahun_pindah is not null and tahun_pindah between $yearBottom and $yearTop group by tahun_pindah";
        $data_pindahs = _fetchMultipleFromSql($sql);
        $sql = "SELECT tahun_datang as tahun, sum(jumlah) as jumlah from statistik_pendatang_tahunan slt where slt.desa_id IN ('$imploded') and tahun_datang is not null and tahun_datang between $yearBottom and $yearTop group by tahun_datang";
        $data_datangs = _fetchMultipleFromSql($sql);

        $datas = array();
        for ($i=$yearBottom;$i<=$yearTop;$i++) {
            $tahun = $i;

            $jumlah_lahir = array_filter($data_lahirs, function ($data_lahir) use($tahun) {
                return $data_lahir['tahun'] == $tahun;
            });
            if ($jumlah_lahir) {
                $jumlah_lahir = array_values($jumlah_lahir);
                if (count($jumlah_lahir) > 0) {
                    $jumlah_lahir = @$jumlah_lahir[0]['jumlah'];
                } else {
                    $jumlah_lahir = 0;
                }
            } else {
                $jumlah_lahir = 0;
            }

            $jumlah_wafat = array_filter($data_wafats, function ($data_wafat) use($tahun) {
                return $data_wafat['tahun'] == $tahun;
            });
            if ($jumlah_wafat) {
                $jumlah_wafat = array_values($jumlah_wafat);
                if (count($jumlah_wafat) > 0) {
                    $jumlah_wafat = @$jumlah_wafat[0]['jumlah'];
                } else {
                    $jumlah_wafat = 0;
                }
            } else {
                $jumlah_wafat = 0;
            }

            $jumlah_pindah = array_filter($data_pindahs, function ($data_pindah) use($tahun) {
                return $data_pindah['tahun'] == $tahun;
            });
            if ($jumlah_pindah) {
                $jumlah_pindah = array_values($jumlah_pindah);
                if (count($jumlah_pindah) > 0) {
                    $jumlah_pindah = @$jumlah_pindah[0]['jumlah'];
                } else {
                    $jumlah_pindah = 0;
                }
            } else {
                $jumlah_pindah = 0;
            }

            $jumlah_datang = array_filter($data_datangs, function ($data_datang) use($tahun) {
                return $data_datang['tahun'] == $tahun;
            });
            if ($jumlah_datang) {
                $jumlah_datang = array_values($jumlah_datang);
                if (count($jumlah_datang) > 0) {
                    $jumlah_datang = @$jumlah_datang[0]['jumlah'];
                } else {
                    $jumlah_datang = 0;
                }
            } else {
                $jumlah_datang = 0;
            }

            $datas[] = compact('tahun', 'jumlah_wafat', 'jumlah_lahir', 'jumlah_datang', 'jumlah_pindah');
        }
        return $datas;
    }
}

if (!function_exists('getDataLampidBulan')) {
    function getDataLampidBulan($year) {
        $desaIds = getMultipleDesaId();
        if (empty($desaIds)) $desaIds = array("false");
        $imploded = implode("', '", $desaIds);
        $sql = "SELECT tahun_lahir as tahun, bulan_lahir as bulan, sum(jumlah) as jumlah from statistik_lahir_bulanan slt where slt.desa_id IN ('$imploded') and tahun_lahir is not null and tahun_lahir ='$year' group by tahun_lahir, bulan_lahir";
        $data_lahirs = _fetchMultipleFromSql($sql);
        $sql = "SELECT tahun_wafat as tahun, bulan_wafat as bulan, sum(jumlah) as jumlah from statistik_kematian_bulanan slt where slt.desa_id IN ('$imploded') and tahun_wafat is not null and tahun_wafat ='$year' group by tahun_wafat, bulan_wafat";
        $data_wafats = _fetchMultipleFromSql($sql);
        $sql = "SELECT tahun_pindah as tahun, bulan_pindah as bulan, sum(jumlah) as jumlah from statistik_pindah_bulanan slt where slt.desa_id IN ('$imploded') and tahun_pindah is not null and tahun_pindah ='$year' group by tahun_pindah, bulan_pindah";
        $data_pindahs = _fetchMultipleFromSql($sql);
        $sql = "SELECT tahun_datang as tahun, bulan_datang as bulan, sum(jumlah) as jumlah from statistik_pendatang_bulanan slt where slt.desa_id IN ('$imploded') and tahun_datang is not null and tahun_datang ='$year' group by tahun_datang, bulan_datang";
        $data_datangs = _fetchMultipleFromSql($sql);

        $datas = array();
        for ($i=1;$i<=12;$i++) {
            $tahun = $year;
            $bulan = $i;

            $jumlah_lahir = array_filter($data_lahirs, function ($data_lahir) use($tahun, $bulan) {
                return $data_lahir['tahun'] == $tahun && $data_lahir['bulan'] == $bulan;
            });
            if ($jumlah_lahir) {
                $jumlah_lahir = array_values($jumlah_lahir);
                if (count($jumlah_lahir) > 0) {
                    $jumlah_lahir = @$jumlah_lahir[0]['jumlah'];
                } else {
                    $jumlah_lahir = 0;
                }
            } else {
                $jumlah_lahir = 0;
            }

            $jumlah_wafat = array_filter($data_wafats, function ($data_wafat) use($tahun, $bulan) {
                return $data_wafat['tahun'] == $tahun && $data_wafat['bulan'] == $bulan;
            });
            if ($jumlah_wafat) {
                $jumlah_wafat = array_values($jumlah_wafat);
                if (count($jumlah_wafat) > 0) {
                    $jumlah_wafat = @$jumlah_wafat[0]['jumlah'];
                } else {
                    $jumlah_wafat = 0;
                }
            } else {
                $jumlah_wafat = 0;
            }

            $jumlah_pindah = array_filter($data_pindahs, function ($data_pindah) use($tahun, $bulan) {
                return $data_pindah['tahun'] == $tahun && $data_pindah['bulan'] == $bulan;
            });
            if ($jumlah_pindah) {
                $jumlah_pindah = array_values($jumlah_pindah);
                if (count($jumlah_pindah) > 0) {
                    $jumlah_pindah = @$jumlah_pindah[0]['jumlah'];
                } else {
                    $jumlah_pindah = 0;
                }
            } else {
                $jumlah_pindah = 0;
            }

            $jumlah_datang = array_filter($data_datangs, function ($data_datang) use($tahun, $bulan) {
                return $data_datang['tahun'] == $tahun && $data_datang['bulan'] == $bulan;
            });
            if ($jumlah_datang) {
                $jumlah_datang = array_values($jumlah_datang);
                if (count($jumlah_datang) > 0) {
                    $jumlah_datang = @$jumlah_datang[0]['jumlah'];
                } else {
                    $jumlah_datang = 0;
                }
            } else {
                $jumlah_datang = 0;
            }

            $datas[] = compact('tahun', 'bulan', 'jumlah_wafat', 'jumlah_lahir', 'jumlah_datang', 'jumlah_pindah');

        }
        return $datas;

    }
}

if (!function_exists('getDataLampidTanggal')) {
    function getDataLampidTanggal($year, $month) {
        $month = (int) $month;
        $month = strlen($month) < 2 ? "0{$month}" : $month;
        $desaIds = getMultipleDesaId();
        if (empty($desaIds)) $desaIds = array("false");
        $imploded = implode("', '", $desaIds);
        $sql = "SELECT tahun_lahir as tahun, bulan_lahir as bulan, tanggal_lahir as tanggal, sum(jumlah) as jumlah from statistik_lahir_harian slt where slt.desa_id IN ('$imploded') and tahun_lahir is not null and tahun_lahir ='$year' and bulan_lahir='$month' group by tahun_lahir, bulan_lahir, tanggal_lahir";
        $data_lahirs = _fetchMultipleFromSql($sql);
        $sql = "SELECT tahun_wafat as tahun, bulan_wafat as bulan, tanggal_wafat as tanggal, sum(jumlah) as jumlah from statistik_kematian_harian slt where slt.desa_id IN ('$imploded') and tahun_wafat is not null and tahun_wafat ='$year' and bulan_wafat='$month' group by tahun_wafat, bulan_wafat, tanggal_wafat";
        $data_wafats = _fetchMultipleFromSql($sql);
        $sql = "SELECT tahun_pindah as tahun, bulan_pindah as bulan, tanggal_pindah as tanggal, sum(jumlah) as jumlah from statistik_pindah_harian slt where slt.desa_id IN ('$imploded') and tahun_pindah is not null and tahun_pindah ='$year' and bulan_pindah='$month' group by tahun_pindah, bulan_pindah, tanggal_pindah";
        $data_pindahs = _fetchMultipleFromSql($sql);
        $sql = "SELECT tahun_datang as tahun, bulan_datang as bulan, tanggal_datang as tanggal, sum(jumlah) as jumlah from statistik_pendatang_harian slt where slt.desa_id IN ('$imploded') and tahun_datang is not null and tahun_datang ='$year' and bulan_datang='$month' group by tahun_datang, bulan_datang, tanggal_datang";
        $data_datangs = _fetchMultipleFromSql($sql);

        $datas = array();
        $daysCount = cal_days_in_month(CAL_GREGORIAN,$month,$year);
        for ($i=1;$i<=$daysCount;$i++) {
            $tahun = $year;
            $bulan = $month;
            $tanggal = $i;

            $jumlah_lahir = array_filter($data_lahirs, function ($data_lahir) use($tahun, $bulan, $tanggal) {
                return $data_lahir['tahun'] == $tahun && $data_lahir['bulan'] == $bulan && $data_lahir['tanggal'] == $tanggal;
            });
            if ($jumlah_lahir) {
                $jumlah_lahir = array_values($jumlah_lahir);
                if (count($jumlah_lahir) > 0) {
                    $jumlah_lahir = @$jumlah_lahir[0]['jumlah'];
                } else {
                    $jumlah_lahir = 0;
                }
            } else {
                $jumlah_lahir = 0;
            }

            $jumlah_wafat = array_filter($data_wafats, function ($data_wafat) use($tahun, $bulan, $tanggal) {
                return $data_wafat['tahun'] == $tahun && $data_wafat['bulan'] == $bulan && $data_wafat['tanggal'] == $tanggal;
            });
            if ($jumlah_wafat) {
                $jumlah_wafat = array_values($jumlah_wafat);
                if (count($jumlah_wafat) > 0) {
                    $jumlah_wafat = @$jumlah_wafat[0]['jumlah'];
                } else {
                    $jumlah_wafat = 0;
                }
            } else {
                $jumlah_wafat = 0;
            }

            $jumlah_pindah = array_filter($data_pindahs, function ($data_pindah) use($tahun, $bulan, $tanggal) {
                return $data_pindah['tahun'] == $tahun && $data_pindah['bulan'] == $bulan && $data_pindah['tanggal'] == $tanggal;
            });
            if ($jumlah_pindah) {
                $jumlah_pindah = array_values($jumlah_pindah);
                if (count($jumlah_pindah) > 0) {
                    $jumlah_pindah = @$jumlah_pindah[0]['jumlah'];
                } else {
                    $jumlah_pindah = 0;
                }
            } else {
                $jumlah_pindah = 0;
            }

            $jumlah_datang = array_filter($data_datangs, function ($data_datang) use($tahun, $bulan, $tanggal) {
                return $data_datang['tahun'] == $tahun && $data_datang['bulan'] == $bulan && $data_datang['tanggal'] == $tanggal;
            });
            if ($jumlah_datang) {
                $jumlah_datang = array_values($jumlah_datang);
                if (count($jumlah_datang) > 0) {
                    $jumlah_datang = @$jumlah_datang[0]['jumlah'];
                } else {
                    $jumlah_datang = 0;
                }
            } else {
                $jumlah_datang = 0;
            }

            $datas[] = compact('tahun', 'bulan', 'tanggal', 'jumlah_wafat', 'jumlah_lahir', 'jumlah_datang', 'jumlah_pindah');

        }
        return $datas;
    }
}

if (!function_exists('getMonthListIndonesia')) {
    function getMonthListIndonesia() {
        return array(
            'Januari', 'Pebruari', 'Maret',
            'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember'
        );
    }
}
