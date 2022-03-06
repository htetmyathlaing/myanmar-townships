# Myanmar-Townships

မြန်မာနိုင်ငံရှိမြို့နယ်များကို အလွယ်တကူ ရှာဖွေနိုင်ရန် အတွက် ပြုလုပ်ထားသောာ Laravel Package တစ်ခုဖြစ်သည်။ ရှာဖွေမှုနှင့် ဒေတာအချက်အလက်များအတွက် Unicode သီးသန့်သာ ထောက်ပံ့ထားသည်။

## Installation
```
    composer require htetmyathlaing/myanmar-townships
```
Installation ပြုလုပ်ပြီးနောက် database setup ပြုလုပ်ရန်လိုသည်။
```
    php artisan migrate
    php artisan db:seed --class="HtetMyatHlaing\MyanmarTownships\MyanmarTownshipsSeeder"
```

## Usage

#### Basic Uasage
MyanmarTownship Facade ကို အသုံးပြုပြီး မြို့နယ်၊ ခရိုင်၊ ပြည်နယ်(သို့)တိုင်းဒေသကြီးကို များ အလွယ်တကူ ရှာဖွေနိုင်မည်ဖြစ်သည်။
```
    MyanmarTownship::searchTownships('ဟင်္သာတ');
    MyanmarTownship::searchDistricts('ဟင်္သာတ');
    MyanmarTownship::searchStates('ဧရာဝတီ');
```
### Searching
MyanmarTownship Facade တွင် အောက်ပါ method သုံးခုကို ထောက်ပံ့ထားသည်။
 - searchTownships
 - searchDistricts
 - searchStates
 
 ### Search Options
 ှSearch ပြုလုပ်ရာတွင် options များထည့်သွင်း အသုံးပြုနိုင်သည်။
 ```
    MyanmarTownship::searchTownships('က' , ['keys' => ['name_mm']]);
```
အောက်ပါ options များကို method အားလုံးတွင် အသုံးပြုနိုင်။
| key      | type    | options   | Default Value |
| -------- | ------- | --------- | ------------- |
| order    | string  | asc, desc | asc           |
| paginate | integer |           | 0             |
| limit    | integer |           | 10            |

searchDistricts method တွင် အောက်ပါ options များကို အသုံးပြုနိုင်သည်။
| key  | type   | options                                                               | Default Value      |
| ---- | ------ | --------------------------------------------------------------------- | ------------------ |
| keys | array  | name_en, name_mm, tsp_code_en, tsp_code_mm, postal_code, lat, lng     | [name_en ,name_mm] |
| with | array  | district                                                              | []                 |
| sort | string | id, name_en, name_mm, tsp_code_en, tsp_code_mm, postal_code, lat, lng | name_mm            |

searchDistricts method တွင် အောက်ပါ options များကို အသုံးပြုနိုင်သည်။
| key  | type   | options                        | Default Value      |
| ---- | ------ | ------------------------------ | ------------------ |
| keys | array  | name_en, name_mm, lat, lng     | [name_en ,name_mm] |
| with | array  | state,townships                | []                 |
| sort | string | id, name_en, name_mm, lat, lng | name_mm            |

searchStates method တွင် အောက်ပါ options များကို အသုံးပြုနိုင်သည်။
| key  | type   | options                                        | Default Value      |
| ---- | ------ | ---------------------------------------------- | ------------------ |
| keys | array  | name_en, name_mm, sr_code, sr_id, lat, lng     | [name_en ,name_mm] |
| with | array  | district, townships                            | []                 |
| sort | string | id, name_en, name_mm, sr_code, sr_id, lat, lng | name_mm            |
 
 ## Traits
 ### HasTownship
 township_id ရှိတဲ့ မည့်သည့် model တွင် မဆို HasTownship trait ကို အသုံးပြုနိုင်သည်။
 ### HasTownshipPolyMorph
 Polymorhpic Relation အဖြစ် သုံးမည်ဆိုလျှင် အသုံးပြုမည့် Model တွင် HasTownshipPolyMorph ကို အသုံးပြုနိုင်သည်။

 ```
    $model->saveTownship($townsip)
```
OR
 ```
    $model->saveTownship($townshipId)
```



 