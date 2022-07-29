<input type="checkbox" {{ $row->is_delivered ? 'checked' : '' }} class="delivery_chk"
       name='is_delivered' value="1" data-id = {{ $row->id }}>
