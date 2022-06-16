<div class="card-table">
    <div class="card">
        <div class="card-header card-header-divider pb-0" style="border-bottom: 0"><h6 class="element-header">List
                Permissions</h6></div>
        <div class="card-body">
            @foreach($modules as $module)
                @if($module['slug'] != 'dashboard')
                    @if(empty($module['children']))
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 style="color: #6e6eff;">{{ $module['title'] }}</h6>
                            </div>
                            <div class="col-sm-8">
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="hidden" name="add[{{ $module['slug'] }}]" value="0">
                                    <input type="checkbox" class="custom-control-input"
                                           name="add[{{ $module['slug'] }}]" value="1"><span
                                            class="custom-control-label custom-control-color"></span> Add
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="hidden" name="edit[{{ $module['slug'] }}]" value="0">
                                    <input type="checkbox" class="custom-control-input"
                                           name="edit[{{ $module['slug'] }}]" value="1"><span
                                            class="custom-control-label custom-control-color"></span> Edit
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="hidden" name="delete[{{ $module['slug'] }}]" value="0">
                                    <input type="checkbox" class="custom-control-input"
                                           name="delete[{{ $module['slug'] }}]" value="1"><span
                                            class="custom-control-label custom-control-color"></span> Delete
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="hidden" name="view[{{ $module['slug'] }}]" value="0">
                                    <input type="checkbox" class="custom-control-input"
                                           name="view[{{ $module['slug'] }}]" value="1"><span
                                            class="custom-control-label custom-control-color"></span> Detail
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="hidden" name="is_visible[{{ $module['slug'] }}]" value="0">
                                    <input type="checkbox" class="custom-control-input"
                                           name="is_visible[{{ $module['slug'] }}]" value="1"><span
                                            class="custom-control-label custom-control-color"></span> Visible
                                </label>
                            </div>
                        </div>
                    @else
                        @foreach($module['children'] as $children)
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 style="color: #6e6eff;">{{ $children['title'] }}</h6>
                                </div>
                                <div class="col-sm-8">
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="hidden" name="add[{{ $children['slug'] }}]" value="0">
                                        <input type="checkbox" class="custom-control-input"
                                               name="add[{{ $children['slug'] }}]" value="1"><span
                                                class="custom-control-label custom-control-color"></span> Add
                                    </label>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="hidden" name="edit[{{ $children['slug'] }}]" value="0">
                                        <input type="checkbox" class="custom-control-input"
                                               name="edit[{{ $children['slug'] }}]" value="1"><span
                                                class="custom-control-label custom-control-color"></span> Edit
                                    </label>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="hidden" name="delete[{{ $children['slug'] }}]" value="0">
                                        <input type="checkbox" class="custom-control-input"
                                               name="delete[{{ $children['slug'] }}]"
                                               value="1"><span
                                                class="custom-control-label custom-control-color"></span> Delete
                                    </label>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="hidden" name="view[{{ $children['slug'] }}]" value="0">
                                        <input type="checkbox" class="custom-control-input"
                                               name="view[{{ $children['slug'] }}]" value="1"><span
                                                class="custom-control-label custom-control-color"></span> Detail
                                    </label>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="hidden" name="is_visible[{{ $children['slug'] }}]" value="0">
                                        <input type="checkbox" class="custom-control-input"
                                               name="is_visible[{{ $children['slug'] }}]" value="1"><span
                                                class="custom-control-label custom-control-color"></span> Visible
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endif
            @endforeach
        </div>
    </div>
</div>
