<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                "name" => "Sarsılmaz İş Makineleri",
                "key" => "url",
                "value" => "http://127.0.0.1:8000/"
            ],
            [
                "name" => "Hakkımızda",
                "key" => "about",
                "value" => "Sarsılmaz İş Makineleri olarak, inşaat ve endüstri sektöründe her türlü ağır iş makinesi ve ekipmanının tamir, bakım ve onarım hizmetlerini sunmaktayız. Bekoloder, ekskavatör, greyder, dozer, traktör, telehandler ve forklift gibi geniş bir yelpazede arıza tespiti ve onarım işlemleri gerçekleştirmekteyiz.

Müşterilerimizin iş sürekliliğini sağlamak için, hidrolik pompa, valf, piston tamiri ve hidrolik sistem arıza tespiti hizmetleri sunuyoruz. Ayrıca, transpalet tamiri ve revizyonu alanında da uzman ekibimizle çözüm ortaklığı yapmaktayız.

Yedek parça temininden, forklift kiralama hizmetine kadar ihtiyaçlarınıza yönelik kapsamlı çözümler sunuyoruz. Düzenli bakım ihtiyacınızı karşılamak üzere, periyodik bakım kampanyalarımız ile müşterilerimize ekonomik ve güvenilir hizmet sağlıyoruz.

Kaliteli hizmet anlayışımız ve alanında uzman ekibimizle, iş makinelerinizin performansını artırmak ve kesintisiz bir iş akışı sunmak için buradayız.",
            ],
            [
                "name" => "Neden Bizi Seçmelisiniz",
                "key" => "why_choose_us",
                "value" => "İş makinelerinizin tamir, bakım, onarım ve arıza tespiti işlemlerinde uzman ekibimizle hızlı ve güvenilir çözümler sunuyoruz. Bekoloder, ekskavatör, greyder, dozer, traktör, telehandler ve forklift gibi makineleriniz için hidrolik sistem onarımı, mekanik sistem onarımı ve yedek parça temini gibi hizmetleri kaliteli bir şekilde gerçekleştiriyoruz.

Periyodik bakım ve esnek forklift kiralama seçeneklerimizle makinelerinizin verimliliğini artırıyor, iş sürekliliğinizi sağlıyoruz. Orijinal yedek parça kullanarak makinelerinizin ömrünü uzatıyor, zamanında çözümler sunarak iş gücü kaybınızı en aza indiriyoruz."
            ],
            [
                "name" => "Konum",
                "key" => "maps",
                "value" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24832.75148528068!2d27.8429696!3d38.9218304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b9d221bf4d6209%3A0x7540a2e654114253!2sAkhisar%20Otogar%C4%B1!5e0!3m2!1str!2str!4v1733411860523!5m2!1str!2str",
            ],
            [
                "name" => "Fatih Dönmez",
                "key" => "phone",
                "value" => "0537 528 7268"
            ],
            [
                "name" => "Abdullah Işık",
                "key" => "phone",
                "value" => "0536 061 9693"
            ],
            [
                "name" => "Adres",
                "key" => "address",
                "value" => "Akhisar/Manisa"
            ]

        ]);
    }
}
