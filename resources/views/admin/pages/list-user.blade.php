@php( $i = 0 )
@foreach($listUsers as $listUser)
    <tr class="text-center">
        <th scope="row">{{ ++$i }}</th>
        <td>{{ $listUser->name }}</td>
        <td>{{ $listUser->email }}</td>
        <td>{{ $listUser->phone }}</td>
        <td>{{ $listUser->address }}</td>
        <td class="d-flex justify-content-around role-user" data-id="{{ $listUser->id }}">
            <div class="form-check form-check-inline">
                <input class="form-check-input update-role" type="checkbox" id="user" value="4" {{ (in_array(4,$listUser->roles->pluck('id')->toArray())) ? 'checked' : '' }}>
                <label class="form-check-label">User</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input update-role" type="checkbox" id="poster" value="2" {{ (in_array(2,$listUser->roles->pluck('id')->toArray())) ? 'checked' : '' }}>
                <label class="form-check-label">Poster</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input update-role" type="checkbox" id="dev" value="3" {{ (in_array(3,$listUser->roles->pluck('id')->toArray())) ? 'checked' : '' }}>
                <label class="form-check-label">Dev</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input update-role" type="checkbox" value="1" {{ (in_array(1,$listUser->roles->pluck('id')->toArray())) ? 'checked' : '' }}>
                <label class="form-check-label">Admin</label>
            </div>
        </td>
@endforeach
