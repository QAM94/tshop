<input type="hidden" value="{{ $row->id }}" id="id">

<button class="btn btn-sm dropdown-toggle tx-12" type="button" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
    Actions
</button>
<div class="dropdown-menu" x-placement="top-start"
     style="position: absolute; transform: translate3d(0px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
    @if(in_array('edit',$actions) && hasRole($module , 'edit'))
        <a href="javascript:;" onclick="openEditModal('{{ $row->id }}')" class="dropdown-item">
            <i class="fa fa-edit"></i> Edit
        </a>
    @endif
    @if(in_array('delete',$actions) && hasRole($module , 'delete'))
        <a href="javascript:;" onclick="deleteRow('{{$row->id}}','{{ $module }}')" class="dropdown-item">
            <i class="fa fa-trash"></i> Delete
        </a>
    @endif
    @if(in_array('view',$actions) && (hasRole($module , 'view') || $module == 'dashboard'))
        <a class="dropdown-item" href="javascript:;" onclick="viewRow('{{$row->id}}','{{ $module }}')">View Details</a>
    @endif

    @if(in_array('recall',$actions) && (hasRole($module , 'recall') || $module == 'dashboard'))
        <a class="dropdown-item" href="javascript:;" onclick="sendRecall('{{$row->id}}','{{ $module }}')">Send
            Recall</a>
    @endif

    @if(in_array('customer_details',$actions))
        <a class="dropdown-item" href="javascript:;" onclick="getRecalledCustomers('{{$row->id}}','{{ $module }}')">Customer
            Details</a>
        <div class="dropdown-divider"></div>
    @endif

    @if(in_array('quick_email',$actions))
        <a class="dropdown-item" href="javascript:;" onclick="sendQuickEmail('{{$row->id}}','{{ $module }}')">Quick
            Email</a>
    @endif

    @if(in_array('compose_email',$actions))
        <a class="dropdown-item" href="javascript:;" onclick="sendCustomEmail('{{$row->id}}','{{ $module }}')">Compose
            Email</a>
        <div class="dropdown-divider"></div>
    @endif

    @if(in_array('quick_sms',$actions))
        <a class="dropdown-item" href="javascript:;" onclick="sendQuickSms('{{$row->id}}','{{ $module }}')">Quick
            SMS</a>
    @endif

    @if(in_array('compose_sms',$actions))
        <a class="dropdown-item" href="javascript:;" onclick="sendCustomSms('{{$row->id}}','{{ $module }}')">Compose
            SMS</a>
    @endif
</div>