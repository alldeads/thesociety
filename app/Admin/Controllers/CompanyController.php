<?php

namespace App\Admin\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use App\Models\CompanyRole;
use App\Models\CompanyChartAccount;
use App\Models\CompanyMenu;
use App\Models\Menu;
use App\Models\Profile;
use App\Models\ChartAccount;

use Spatie\Permission\Models\Permission;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CompanyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Company';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Company());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('phone', __('Phone'));
        $grid->column('status', __('Status'));
        $grid->column('created_at', __('Created at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Company::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('fax', __('Fax'));
        $show->field('avatar', __('Avatar'));
        $show->field('bir', __('Bir'));
        $show->field('dti', __('Dti'));
        $show->field('sss', __('Sss'));
        $show->field('business_permit', __('Business permit'));
        $show->field('street', __('Street'));
        $show->field('address_line_2', __('Address line 2'));
        $show->field('city', __('City'));
        $show->field('state', __('State'));
        $show->field('postal', __('Postal'));
        $show->field('facebook', __('Facebook'));
        $show->field('twitter', __('Twitter'));
        $show->field('instagram', __('Instagram'));
        $show->field('linkedin', __('Linkedin'));
        $show->field('youtube', __('Youtube'));
        $show->field('pinterest', __('Pinterest'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Company());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->mobile('phone', __('Phone'));
        $form->text('fax', __('Fax'));
        $form->image('avatar', __('Avatar'));
        $form->text('bir', __('Bir'));
        $form->text('dti', __('Dti'));
        $form->text('sss', __('Sss'));
        $form->text('business_permit', __('Business permit'));
        $form->text('address_line_1', __('Street'));
        $form->text('address_line_2', __('Address line 2'));
        $form->text('city', __('City'));
        $form->text('state', __('State'));
        $form->text('postal', __('Postal'));
        $form->text('status', __('Status'))->default('active');

        $form->saved(function (Form $form) {

            $id = $form->model()->id ?? 0;

            $company = Company::find($id);
            $employees = count($company->employees);

            if ( $employees == 0 ) {
                $user = User::create([
                    'company_id' => $company->id,
                    'email'      => $company->email,
                    'status'     => 'active',
                    'password'   => bcrypt('AKIAQO2FZLPHW3JR6W4O')
                ]);

                Profile::create([
                    'user_id'    => $user->id
                ]);

                $role = CompanyRole::create([
                    'role_name'  => 'owner',
                    'company_id' => $company->id,
                    'created_by' => $user->id
                ]);

                $employee = Employee::create([
                    'user_id'    => $user->id,
                    'company_id' => $company->id,
                    'role_id'    => $role->id,
                    'created_by' => $user->id,
                ]);

                $menus = Menu::all();

                foreach ($menus as $menu) {
                    CompanyMenu::create([
                        'menu_id'    => $menu->id,
                        'company_id' => $company->id
                    ]);
                }

                $charts = ChartAccount::all();

                foreach( $charts as $chart ) {
                    CompanyChartAccount::create([
                        'chart_name'    => $chart->name,
                        'code'          => $chart->code,
                        'chart_type_id' => $chart->chart_type_id,
                        'company_id'    => $company->id,
                        'created_by'    => $user->id,
                    ]);
                }

                $permissions = Permission::all();

                foreach ($permissions as $permission) {
                    $user->givePermissionTo($permission);
                }
            }
        });

        return $form;
    }
}
