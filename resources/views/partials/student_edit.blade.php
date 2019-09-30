<div class="modal fade" id="studentEditModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Students Info</h4>
                <button aria-hidden="true" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="studentEditForm">
                    <div class="alert alert-danger" id="edit-error-bag">
                        <ul id="edit-student-errors">
                        </ul>
                    </div>
                    <div class="form-group m-2 align-text-bottom">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" required>
                    </div>
                    <div class="form-group m-2 align-text-bottom">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" required>
                    </div>
                    <div class="form-group m-2 align-text-bottom">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="radioMale" value="1">
                            <label class="form-check-label" for="radioMale">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="radioFemale" value="0">
                            <label class="form-check-label" for="radioFemale">Female</label>
                        </div>                                    
                    </div>
                    <div class="form-group m-2 align-text-bottom">
                        <input type='date' class="form-control" name="birthday" id="birthday" required>
                    </div>
                    <div class="form-group m-2 align-text-bottom">
                        <label for="group">Group name</label>
                        <input type="text" class="form-control" name="group" id="group" placeholder="Group" required>
                    </div>
                    <div class="form-group m-2 align-text-bottom">
                        <label for="faculty">Faculty</label>
                        <input type="text" class="form-control" name="faculty" id="faculty" placeholder="Faculty" required>
                    </div>
                    <div class="form-group m-3">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="editStudentBtn" data-dismiss="modal" value="0">
                        Update Info</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>