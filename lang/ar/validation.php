<?php
return [

/*
|----------------------------------------------------------------------
| Validation Language Lines
|----------------------------------------------------------------------
|
| The following language lines contain the default error messages used by
| the validator class. Some of these rules have multiple versions such
| as the size rules. Feel free to tweak each of these messages here.
|
*/

'accepted' => 'يجب قبول :attribute.',
'accepted_if' => 'يجب قبول :attribute عندما يكون :other هو :value.',
'active_url' => ':attribute ليس عنوان URL صالح.',
'after' => 'يجب أن يكون :attribute تاريخاً بعد :date.',
'after_or_equal' => 'يجب أن يكون :attribute تاريخاً بعد أو يساوي :date.',
'alpha' => 'يجب أن يحتوي :attribute على حروف فقط.',
'alpha_dash' => 'يجب أن يحتوي :attribute على حروف، أرقام، شرطات أو شرطات سفلية فقط.',
'alpha_num' => 'يجب أن يحتوي :attribute على حروف وأرقام فقط.',
'array' => 'يجب أن يكون :attribute مصفوفة.',
'before' => 'يجب أن يكون :attribute تاريخاً قبل :date.',
'before_or_equal' => 'يجب أن يكون :attribute تاريخاً قبل أو يساوي :date.',
'between' => [
    'numeric' => 'يجب أن يكون :attribute بين :min و :max.',
    'file' => 'يجب أن يكون :attribute بين :min و :max كيلوبايت.',
    'string' => 'يجب أن يكون :attribute بين :min و :max حرفاً.',
    'array' => 'يجب أن يحتوي :attribute على بين :min و :max عنصر.',
],
'boolean' => 'يجب أن يكون حقل :attribute إما صحيح أو خطأ.',
'confirmed' => 'تأكيد :attribute غير متطابق.',
'current_password' => 'كلمة المرور غير صحيحة.',
'date' => ':attribute ليس تاريخاً صالحاً.',
'date_equals' => 'يجب أن يكون :attribute تاريخاً مساوياً لـ :date.',
'date_format' => ':attribute لا يتطابق مع التنسيق :format.',
'declined' => 'يجب رفض :attribute.',
'declined_if' => 'يجب رفض :attribute عندما يكون :other هو :value.',
'different' => 'يجب أن يكون :attribute و :other مختلفين.',
'digits' => 'يجب أن يكون :attribute :digits رقم.',
'digits_between' => 'يجب أن يكون :attribute بين :min و :max رقم.',
'dimensions' => ':attribute يحتوي على أبعاد صورة غير صالحة.',
'distinct' => 'حقل :attribute يحتوي على قيمة مكررة.',
'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صالح.',
'ends_with' => 'يجب أن ينتهي :attribute بأحد القيم التالية: :values.',
'enum' => ':attribute المحدد غير صالح.',
'exists' => ':attribute المحدد غير صالح.',
'file' => 'يجب أن يكون :attribute ملف.',
'filled' => 'يجب أن يحتوي حقل :attribute على قيمة.',
'gt' => [
    'numeric' => 'يجب أن يكون :attribute أكبر من :value.',
    'file' => 'يجب أن يكون :attribute أكبر من :value كيلوبايت.',
    'string' => 'يجب أن يكون :attribute أكبر من :value حرف.',
    'array' => 'يجب أن يحتوي :attribute على أكثر من :value عنصر.',
],
'gte' => [
    'numeric' => 'يجب أن يكون :attribute أكبر من أو يساوي :value.',
    'file' => 'يجب أن يكون :attribute أكبر من أو يساوي :value كيلوبايت.',
    'string' => 'يجب أن يكون :attribute أكبر من أو يساوي :value حرف.',
    'array' => 'يجب أن يحتوي :attribute على :value عنصر أو أكثر.',
],
'image' => 'يجب أن يكون :attribute صورة.',
'in' => ':attribute المحدد غير صالح.',
'in_array' => 'حقل :attribute غير موجود في :other.',
'integer' => 'يجب أن يكون :attribute عدد صحيح.',
'ip' => 'يجب أن يكون :attribute عنوان IP صالح.',
'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 صالح.',
'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 صالح.',
'json' => 'يجب أن يكون :attribute سلسلة JSON صالحة.',
'lt' => [
    'numeric' => 'يجب أن يكون :attribute أقل من :value.',
    'file' => 'يجب أن يكون :attribute أقل من :value كيلوبايت.',
    'string' => 'يجب أن يكون :attribute أقل من :value حرف.',
    'array' => 'يجب أن يحتوي :attribute على أقل من :value عنصر.',
],
'lte' => [
    'numeric' => 'يجب أن يكون :attribute أقل من أو يساوي :value.',
    'file' => 'يجب أن يكون :attribute أقل من أو يساوي :value كيلوبايت.',
    'string' => 'يجب أن يكون :attribute أقل من أو يساوي :value حرف.',
    'array' => 'يجب أن يحتوي :attribute على :value عنصر أو أقل.',
],
'mac_address' => 'يجب أن يكون :attribute عنوان MAC صالح.',
'max' => [
    'numeric' => 'يجب ألا يكون :attribute أكبر من :max.',
    'file' => 'يجب ألا يكون :attribute أكبر من :max كيلوبايت.',
    'string' => 'يجب ألا يكون :attribute أكبر من :max حرف.',
    'array' => 'يجب ألا يحتوي :attribute على أكثر من :max عنصر.',
],
'mimes' => 'يجب أن يكون :attribute ملفاً من نوع: :values.',
'mimetypes' => 'يجب أن يكون :attribute ملفاً من نوع: :values.',
'min' => [
    'numeric' => 'يجب أن يكون :attribute على الأقل :min.',
    'file' => 'يجب أن يكون :attribute على الأقل :min كيلوبايت.',
    'string' => 'يجب أن يكون :attribute على الأقل :min حرف.',
    'array' => 'يجب أن يحتوي :attribute على الأقل :min عنصر.',
],
'multiple_of' => 'يجب أن يكون :attribute مضاعفاً لـ :value.',
'not_in' => ':attribute المحدد غير صالح.',
'not_regex' => 'تنسيق :attribute غير صالح.',
'numeric' => 'يجب أن يكون :attribute عدد.',
'password' => 'كلمة المرور غير صحيحة.',
'present' => 'يجب أن يكون حقل :attribute موجوداً.',
'prohibited' => 'حقل :attribute محظور.',
'prohibited_if' => 'حقل :attribute محظور عندما يكون :other هو :value.',
'prohibited_unless' => 'حقل :attribute محظور ما لم يكن :other في :values.',
'prohibits' => 'يمنع حقل :attribute وجود :other.',
'regex' => 'تنسيق :attribute غير صالح.',
'required' => 'حقل :attribute مطلوب.',
'required_array_keys' => 'يجب أن يحتوي حقل :attribute على إدخالات لـ: :values.',
'required_if' => 'حقل :attribute مطلوب عندما يكون :other هو :value.',
'required_unless' => 'حقل :attribute مطلوب ما لم يكن :other في :values.',
'required_with' => 'حقل :attribute مطلوب عندما يكون :values موجوداً.',
'required_with_all' => 'حقل :attribute مطلوب عندما تكون :values موجودة.',
'required_without' => 'حقل :attribute مطلوب عندما لا يكون :values موجوداً.',
'required_without_all' => 'حقل :attribute مطلوب عندما لا تكون أي من :values موجودة.',
'same' => 'يجب أن يتطابق :attribute مع :other.',
'size' => [
    'numeric' => 'يجب أن يكون :attribute :size.',
    'file' => 'يجب أن يكون :attribute :size كيلوبايت.',
    'string' => 'يجب أن يكون :attribute :size حرف.',
    'array' => 'يجب أن يحتوي :attribute على :size عنصر.',
],
'starts_with' => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values.',
'string' => 'يجب أن يكون :attribute نص.',
'timezone' => 'يجب أن يكون :attribute منطقة زمنية صالحة.',
'unique' => ':attribute  موجود بالفعل.',
'uploaded' => 'فشل تحميل :attribute.',
'url' => 'يجب أن يكون :attribute عنوان URL صالح.',
'uuid' => 'يجب أن يكون :attribute UUID صالح.',

/*
|----------------------------------------------------------------------
| Custom Validation Language Lines
|----------------------------------------------------------------------
|
| Here you may specify custom validation messages for attributes using the
| convention "attribute.rule" to name the lines. This makes it quick to
| specify a specific custom language line for a given attribute rule.
|
*/

'custom' => [
    'attribute-name' => [
        'rule-name' => 'custom-message',
    ],
],

/*
|----------------------------------------------------------------------
| Custom Validation Attributes
|----------------------------------------------------------------------
|
| The following language lines are used to swap attribute placeholder
| with something more friendly like "E-Mail Address" instead of "email".
| This simply helps us make our messages a little cleaner.
|
*/

'attributes' => [
    'phone' => 'رقم الهاتف',
    'email' => 'البريد الإلكتروني',
    "name" =>"الاسم",
    "password" => 'كلمه المرور '
],
];
