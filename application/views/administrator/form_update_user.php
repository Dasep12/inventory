 	<div class="form-group">
 		<label>Nama User</label>
 		<input class="form-control" type="text" value="<?= $user->nama ?>" name="nama" id="nama2">
 	</div>

 	<div class="form-group">
 		<label>NIK</label>
 		<input class="form-control" value="<?= $user->nik ?>" type="text" name="nik" id="nik2">
 		<input class="form-control" value="<?= $user->nik ?>" type="hidden" name="nik2" >
 	</div>

 	<div class="form-group">
 		<label>Password</label>
 		<input class="form-control" type="password" placeholder="****" name="password" id="password2">
 	</div>

 	<div class="form-group">
 		<label>Level User</label>
 		<select class="form-control" name="role_id">
 			<option value="<?= $user->role_id ?>"><?php if($user->role_id == 1 ) { echo "Administrator" ;} else { echo "User"; } ?></option>
 			<option value="1">Administrator</option>
 			<option value="2">User</option>
 		</select>
 	</div>