@extends('layouts.admin')

@section('title', 'Manage Staff')

@section('content')

<h2 style="font-size:24px;margin-bottom:20px;">Manage Staff</h2>

<button onclick="openAddModal()" class="btn-primary">+ Add Staff</button>

<!-- ADD MODAL -->
<div id="addModal" class="modal">
    <div class="modal-box">
        <h3>Add Staff</h3>
        <span class="close" onclick="closeAddModal()">&times;</span>

        <form method="POST" action="/admin/staff/edit">
            @csrf
            <input type="hidden" name="action" value="add">

            <input name="name" placeholder="Name" class="input" required>
            <input name="email" placeholder="Email" class="input" required>
            <input name="phone" placeholder="Phone" class="input" required>
            <input type="password" name="password" placeholder="Password" class="input" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="input" required>

            <div style="text-align:right">
                <button type="button" onclick="closeAddModal()" class="btn-gray">Cancel</button>
                <button class="btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- EDIT MODAL -->
<div id="editModal" class="modal">
    <div class="modal-box">
        <h3>Edit Staff</h3>
        <span class="close" onclick="closeEditModal()">&times;</span>

        <form method="POST" action="/admin/staff/edit">
            @csrf
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" id="edit-id">

            <input name="name" id="edit-name" class="input" required>
            <input name="email" id="edit-email" class="input" required>
            <input name="phone" id="edit-phone" class="input" required>

            <div style="text-align:right">
                <button type="button" onclick="closeEditModal()" class="btn-gray">Cancel</button>
                <button class="btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- TABLE -->
<table class="table">
<thead>
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
@forelse($staffs as $s)
<tr>
    <td>{{ $s->name }}</td>
    <td>{{ $s->email }}</td>
    <td>{{ $s->phone }}</td>
    <td>
        <button onclick="openEditModal({{ $s->id }}, '{{ $s->name }}', '{{ $s->email }}', '{{ $s->phone }}')" class="btn-primary">Edit</button>

        <form method="POST" action="/admin/staff/delete" style="display:inline">
            @csrf
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="{{ $s->id }}">
            <button onclick="return confirm('Delete staff?')" class="btn-danger">Delete</button>
        </form>
    </td>
</tr>
@empty
<tr><td colspan="4">No staff found</td></tr>
@endforelse
</tbody>
</table>

<style>
.modal{display:none;position:fixed;inset:0;background:rgba(0,0,0,.6)}
.modal-box{background:#020617;width:420px;margin:120px auto;padding:20px;border-radius:8px;color:white;position:relative}
.close{position:absolute;top:10px;right:14px;cursor:pointer;font-size:22px}
.input{width:100%;padding:10px;margin-bottom:10px;background:#0f172a;border:1px solid #1e293b;color:white;border-radius:5px}
.btn-primary{background:#0f766e;color:white;padding:8px 14px;border-radius:5px;border:none}
.btn-gray{background:#475569;color:white;padding:8px 14px;border-radius:5px;border:none}
.btn-danger{background:#dc2626;color:white;padding:8px 14px;border-radius:5px;border:none}
.table{width:100%;margin-top:25px;background:#020617;border-collapse:collapse}
th,td{padding:12px;border-bottom:1px solid #1e293b;color:#cbd5f5}
</style>

<script>
function openAddModal(){document.getElementById('addModal').style.display='block'}
function closeAddModal(){document.getElementById('addModal').style.display='none'}

function openEditModal(id,name,email,phone){
    document.getElementById('edit-id').value=id
    document.getElementById('edit-name').value=name
    document.getElementById('edit-email').value=email
    document.getElementById('edit-phone').value=phone
    document.getElementById('editModal').style.display='block'
}
function closeEditModal(){document.getElementById('editModal').style.display='none'}
</script>

@endsection
