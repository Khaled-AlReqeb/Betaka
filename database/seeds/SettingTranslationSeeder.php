<?php

use Illuminate\Database\Seeder;

class SettingTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\SettingTranslation::create([
            'header_title'=>'<p>Holdings Basigat</p>',
            'header_subTitle'=>'<p>Towards a distant, excited horizon</p>',
            'sector_title'=>'<h2>Main sectors of the major sectors</h2>',
            'about_title'=>'<p>About us</p>',
            'about_content'=>'<p> Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p>',
            'investor_title'=>'<p>Investor relations</p>',
            'investor_content'=>'<p> Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p>',
            'team_title'=>'<p>Teams</p>',
            'project_title'=>'<p>Projects</p>',
            'partner_title'=>'<p>Partners</p>',
            'footer_content'=>'<p> Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p>',
            'address'=>'Lorem ipsum is placeholder text commonly used in the graphic, and print.',
            'terms'=>'',
            'policy'=>'',
            'youtube_url'=>'https://www.youtube.com/embed/DGIXT7ce3vQ',
            'facebook_url'=>'https://www.facebook.com/',
            'instagram_url'=>'https://www.instagram.com/',
            'twitter_url'=>'https://www.twitter.com/',
            'linkenin_url'=>'https://www.linkedin.com/',
            'phone_1'=>'+966 456 494 4',
            'phone_2'=>'+966 456 494 4',
            'email'=>'info@Basigat.holdings.net',
            'language'=>'en',
            'setting_id'=> 1,
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);


        \App\SettingTranslation::create([
            'header_title'=>'<p>باسقات القابضة</p>',
            'header_subTitle'=>'<p>نحو أفق استثاري بعيد</p>',
            'sector_title'=>'<h2>قطاعات باسقات الرئيسية</h2>',
            'about_title'=>'<p>من نحن</p>',
            'about_content'=>'<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>',
            'investor_title'=>'<p>علاقات المستثمرين</p>',
            'investor_content'=>'<p>نحن بصدد إنشاء شبكة عالمية من الشركات من خلال الاستحواذ على fintech و blockchain وغيرها من الشركات ذات الصلة. أول عملية استحواذ لنا هي شركة Fritz Nols AG ، التي تأسست عام 1975 ، وهي شركة سمسار البورصة الألمانية الرائدة سابقًا والمدرجة في بورصة فرانكفورت العامة (CDAX). في الوقت نفسه ، نتفاوض مع شركات التكنولوجيا المالية من أمريكا وآسيا ومنطقة الشرق الأوسط وشمال إفريقيا حول الشراكات الاستراتيجية.</p>',
            'team_title'=>'<p>فريق العمل</p>',
            'project_title'=>'<p>المشاريع</p>',
            'partner_title'=>'<p>الشُركاء</p>',
            'footer_content'=>'<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى</p>',
            'address'=>'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا',
            'terms'=>'',
            'policy'=>'',
            'youtube_url'=>'https://www.youtube.com/embed/DGIXT7ce3vQ',
            'facebook_url'=>'https://www.facebook.com/',
            'instagram_url'=>'https://www.instagram.com/',
            'twitter_url'=>'https://www.twitter.com/',
            'linkenin_url'=>'https://www.linkedin.com/',
            'phone_1'=>'+966 456 494 4',
            'phone_2'=>'+966 456 494 4',
            'email'=>'info@Basigat.holdings.net',
            'language'=>'ar',
            'setting_id'=> 1,
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
    }
}
