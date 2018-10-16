<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Permission;

class ClubsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('slug', 'groep');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'groep',
                'display_name_singular' => 'Groep',
                'display_name_plural'   => 'Groepen',
                'icon'                  => 'voyager-file-text',
                'model_name'            => 'App\\Club',
                'controller'            => '',
                'generate_permissions'  => 1,
                'server_side'           => 1,
                'description'           => '',
            ])->save();
        }

        //Data Rows
        $pageDataType = DataType::where('slug', 'groep')->firstOrFail();
        $dataRow = $this->dataRow($pageDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 1,
            ])->save();
        }


        $dataRow = $this->dataRow($pageDataType, 'callsign');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Callsign',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 2,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Name',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 3,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'locator');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Locator',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 4,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'city');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'City',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 5,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'country');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Country',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 6,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'created_at',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 7,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'updated_at',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 8,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'deleted_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'deleted_at',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 9,
            ])->save();
        }


        //Permissions
        Permission::generateFor('groep');
        //Content

        //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Groep',
            'url'     => '',
            'route'   => 'voyager.groep.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-pirate',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 3,
            ])->save();
        }

    }

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
                'data_type_id' => $type->id,
                'field'        => $field,
            ]);
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
