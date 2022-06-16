<div class="card-table">
    <div class="card">
        <div class="card-header card-header-divider pb-0" style="border-bottom: 0"><h6 class="element-header">List
                Permissions</h6></div>
        <div class="card-body">
            <table class="table table-padded cus_datatable_collapse th-ourset">
                <thead>
                <tr>
                    <th style="text-align: center;">Module</th>
                    <th style="text-align: center;">Add</th>
                    <th style="text-align: center;">Edit</th>
                    <th style="text-align: center;">Delete</th>
                    <th style="text-align: center;">View</th>
                    <th style="text-align: center;">Module Visibility</th>
                </tr>
                </thead>
                <tbody>
                @foreach($modules as $module)
                    @if($module['slug'] != 'dashboard')
                        @if(empty($module['children']))
                            <tr>
                                <td style="text-align: center;">
                                    <p>{{ $module['title'] }}</p>
                                </td>
                                <td style="text-align: center;">
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="hidden" name="add[{{ $module['slug'] }}]" value="0">
                                        <input type="checkbox" class="custom-control-input"
                                               name="add[{{ $module['slug'] }}]"
                                               value="1" {{ checkIfRoleChecked($data->permissions , $module['slug'] , 'add') }}><span
                                                class="custom-control-label custom-control-color"></span>
                                    </label>
                                </td>
                                <td style="text-align: center;">
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="hidden" name="edit[{{ $module['slug'] }}]" value="0">
                                        <input type="checkbox" class="custom-control-input"
                                               name="edit[{{ $module['slug'] }}]"
                                               value="1" {{ checkIfRoleChecked($data->permissions , $module['slug'] , 'edit') }}><span
                                                class="custom-control-label custom-control-color"></span>
                                    </label>
                                </td>
                                <td style="text-align: center;">
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="hidden" name="delete[{{ $module['slug'] }}]" value="0">
                                        <input type="checkbox" class="custom-control-input"
                                               name="delete[{{ $module['slug'] }}]"
                                               value="1" {{ checkIfRoleChecked($data->permissions , $module['slug'] , 'delete') }}><span
                                                class="custom-control-label custom-control-color"></span>
                                    </label>
                                </td>
                                <td style="text-align: center;">
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="hidden" name="view[{{ $module['slug'] }}]" value="0">
                                        <input type="checkbox" class="custom-control-input"
                                               name="view[{{ $module['slug'] }}]"
                                               value="1" {{ checkIfRoleChecked($data->permissions , $module['slug'] , 'view') }}><span
                                                class="custom-control-label custom-control-color"></span>
                                    </label>
                                </td>
                                <td style="text-align: center;">
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="hidden" name="is_visible[{{ $module['slug'] }}]" value="0">
                                        <input type="checkbox" class="custom-control-input"
                                               name="is_visible[{{ $module['slug'] }}]"
                                               value="1" {{ checkIfRoleChecked($data->permissions , $module['slug'] , 'is_visible') }}><span
                                                class="custom-control-label custom-control-color"></span>
                                    </label>
                                </td>
                            </tr>
                        @else
                            @foreach($module['children'] as $children)
                                <tr>
                                    <td style="text-align: center;">
                                        <p>{{ $children['title'] }}</p>
                                    </td>
                                    <td style="text-align: center;">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input type="hidden" name="add[{{ $children['slug'] }}]" value="0">
                                            <input type="checkbox" class="custom-control-input"
                                                   name="add[{{ $children['slug'] }}]"
                                                   value="1" {{ checkIfRoleChecked($data->permissions , $children['slug'] , 'add') }}><span
                                                    class="custom-control-label custom-control-color"></span>
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input type="hidden" name="edit[{{ $children['slug'] }}]" value="0">
                                            <input type="checkbox" class="custom-control-input"
                                                   name="edit[{{ $children['slug'] }}]"
                                                   value="1" {{ checkIfRoleChecked($data->permissions , $children['slug'] , 'edit') }}><span
                                                    class="custom-control-label custom-control-color"></span>
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input type="hidden" name="delete[{{ $children['slug'] }}]" value="0">
                                            <input type="checkbox" class="custom-control-input"
                                                   name="delete[{{ $children['slug'] }}]"
                                                   value="1" {{ checkIfRoleChecked($data->permissions , $children['slug'] , 'delete')}}><span
                                                    class="custom-control-label custom-control-color"></span>
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input type="hidden" name="view[{{ $children['slug'] }}]" value="0">
                                            <input type="checkbox" class="custom-control-input"
                                                   name="view[{{ $children['slug'] }}]"
                                                   value="1" {{ checkIfRoleChecked($data->permissions , $children['slug'] , 'view') }}><span
                                                    class="custom-control-label custom-control-color"></span>
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input type="hidden" name="is_visible[{{ $children['slug'] }}]" value="0">
                                            <input type="checkbox" class="custom-control-input"
                                                   name="is_visible[{{ $children['slug'] }}]"
                                                   value="1" {{ checkIfRoleChecked($data->permissions , $children['slug'] , 'is_visible') }}><span
                                                    class="custom-control-label custom-control-color"></span>
                                        </label>
                                    </td>
                                </tr>
                                <!-- Modal-->
                            @endforeach
                        @endif
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

