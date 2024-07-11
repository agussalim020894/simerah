<?php
namespace Database\Seeders;
use App\Model\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class menuSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('menus')->truncate();
        $isi='[
          {
            "id": 39,
            "parent_id": null,
            "kode": "data",
            "nama": "Data",
            "link": "data",
            "icon": "fas fa-ad",
            "tampil": 1,
            "urut": 0,
            "status": 0,
            "detail": {
              "model": "Data",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 10,
            "parent_id": null,
            "kode": "pengaturan",
            "nama": "Pengaturan",
            "link": "pengaturan",
            "icon": "fas fa-cogs",
            "tampil": 1,
            "urut": 1,
            "status": 1,
            "detail": {
              "model": "",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 1,
            "parent_id": null,
            "kode": "pengaturanroot",
            "nama": "Pengaturan Root",
            "link": "pengaturanroot",
            "icon": "fab fa-android",
            "tampil": 1,
            "urut": 2,
            "status": 1,
            "detail": {
              "model": "",
              "title": null,
              "keterangan": null
            }
          },
          {
            "id": 34,
            "parent_id": null,
            "kode": "aplikasi",
            "nama": "Aplikasi",
            "link": "aplikasi",
            "icon": "fas fa-laptop",
            "tampil": 1,
            "urut": 3,
            "status": 1,
            "detail": {
              "model": "aplikasi",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 24,
            "parent_id": null,
            "kode": "slider",
            "nama": "Slider",
            "link": "slider",
            "icon": "fas fa-sliders-h",
            "tampil": 1,
            "urut": 4,
            "status": 1,
            "detail": {
              "model": "foto",
              "title": null,
              "keterangan": null
            }
          },
          {
            "id": 29,
            "parent_id": null,
            "kode": "kontak",
            "nama": "Kontak",
            "link": "kontak",
            "icon": "far fa-address-book",
            "tampil": 1,
            "urut": 5,
            "status": 1,
            "detail": {
              "model": "Kontak",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 35,
            "parent_id": null,
            "kode": "mitrakerjasama",
            "nama": "Mitrakerjasama",
            "link": "mitrakerjasama",
            "icon": "fas fa-address-card",
            "tampil": 1,
            "urut": 6,
            "status": 1,
            "detail": {
              "model": "Mitrakerjasama",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 36,
            "parent_id": null,
            "kode": "wilayah",
            "nama": "Wilayah",
            "link": "wilayah",
            "icon": "fas fa-location-arrow",
            "tampil": 1,
            "urut": 7,
            "status": 1,
            "detail": {
              "model": "Wilayah",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 37,
            "parent_id": null,
            "kode": "elemen",
            "nama": "Elemen",
            "link": "elemen",
            "icon": "fas fa-list",
            "tampil": 1,
            "urut": 8,
            "status": 1,
            "detail": {
              "model": "Elemen",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 38,
            "parent_id": null,
            "kode": "laporan",
            "nama": "Laporan",
            "link": "laporan",
            "icon": "far fa-file-alt",
            "tampil": 1,
            "urut": 9,
            "status": 1,
            "detail": {
              "model": "",
              "title": "",
              "keterangan": ""
            }
          },
          {
            "id": 2,
            "parent_id": 1,
            "kode": "extra",
            "nama": "Extra",
            "link": "extra",
            "icon": "fas fa-expand-arrows-alt",
            "tampil": 1,
            "urut": 1,
            "status": 0,
            "detail": {
              "model": "",
              "title": null,
              "keterangan": null
            }
          },
          {
            "id": 3,
            "parent_id": 1,
            "kode": "menu",
            "nama": "Menu",
            "link": "menu",
            "icon": "fas fa-th-list",
            "tampil": 1,
            "urut": 2,
            "status": 1,
            "detail": {
              "model": "Menu",
              "title": null,
              "keterangan": null
            }
          },
          {
            "id": 4,
            "parent_id": 1,
            "kode": "aksesgrup",
            "nama": "Akses Grup",
            "link": "aksesgrup",
            "icon": "fas fa-universal-access",
            "tampil": 1,
            "urut": 3,
            "status": 1,
            "detail": {
              "model": "",
              "title": null,
              "keterangan": null
            }
          },
          {
            "id": 6,
            "parent_id": 2,
            "kode": "aksesmenu",
            "nama": "Akses Menu",
            "link": "aksesmenu",
            "icon": "fab fa-accessible-icon",
            "tampil": 1,
            "urut": 1,
            "status": 1,
            "detail": {
              "model": "",
              "title": null,
              "keterangan": null
            }
          },
          {
            "id": 5,
            "parent_id": 10,
            "kode": "user",
            "nama": "User",
            "link": "user",
            "icon": "fas fa-users",
            "tampil": 1,
            "urut": 1,
            "status": 1,
            "detail": {
              "model": "",
              "title": null,
              "keterangan": null
            }
          }
        ]';
        foreach (json_decode($isi, TRUE) as $menu) {
            Menu::create($menu);
        }
        Schema::enableForeignKeyConstraints();
    }
}
