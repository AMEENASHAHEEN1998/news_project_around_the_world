<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'كل الاخبار',
            'الأخبار المنشورة',
            'الموافقة على الأخبار ',
            'الأخبار المرفوضة',
            'اضافة خبر جديد',
            'تعديل خبر',
            'حذف خبر',
            'عرض خبر',
            'أصناف الأخبار',
            'كافة أصناف الأخبار',
            'كل صنف من الأخبار',
            'تعديل صنف',
            'حذف صنف',
            'اضافة صنف جديد',
            'المستخدمين',
            'قائمة المستخدمين',
            'اضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',
            'صلاحية المستخدمين',
            'عرض صلاحية',
            'اضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
