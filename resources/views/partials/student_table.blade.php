<table id="dtBasic" class="table table-striped table-bordered table-hover " cellspacing="0">
    <thead>
        <tr>
            <th class="th-sm flex-fill">#
            </th>
            <th class="th-sm flex-fill">First Name
            </th>
            <th class="th-sm flex-fill">Last Name
            </th>
            <th class="th-sm flex-fill">Sex
            </th>
            <th class="th-sm flex-fill">Age
            </th>
            <th class="th-sm flex-fill">Group
            </th>
            <th class="th-sm flex-fill">Faculty
            </th>
            <th class="th-sm flex-fill" colspan="2">Action
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->first_name}}</td>
                <td>{{$student->last_name}}</td>
                <td>{{$student->sex ? 'M' : 'F'}}</td>
                <td>{{$student->age}}</td>
                <td>{{$student->group}}</td>
                <td>{{$student->faculty}}</td>
                <td class="text-center">
        <a onclick="event.preventDefault();editStudentForm({{$student->id}});" href="#" class="edit bmn-link open-modal" data-toggle="modal" value="{{$student->id}}">
            <i class="fas fa-pen" style="color: #f5c71a;"></i> Edit 
        </a>
                </td>
                <td>
        <a onclick="event.preventDefault();removeStudentForm({{$student->id}});" href="#" class="delete btn-link" data-toggle="modal">
        <i class="fas fa-trash-alt" style="color: red;"></i> Remove 
        </a>
                </td>           
            </tr>            
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th class="th-sm flex-fill">#
            </th>
            <th class="th-sm flex-fill">First Name
            </th>
            <th class="th-sm flex-fill">Last Name
            </th>
            <th class="th-sm flex-fill">Sex
            </th>
            <th class="th-sm flex-fill">Age
            </th>
            <th class="th-sm flex-fill">Group
            </th>
            <th class="th-sm flex-fill">Faculty
            </th>
            <th class="th-sm flex-fill" colspan="2">Action
            </th>
        </tr>
    </tfoot>
</table>

<div class="clearfix col p-0">
    <div class="col p-0 text-left">
    <div class="row h-100">
        <div id="pagesBlock" class="h-auto my-auto">
            {{ $students->links() }}
        </div>

        <div class="col hint-text  my-auto">
            <span>Showing <b>{{$students->count()}}</b> out of <b>{{$students->total()}}</b> entries</span>
        </div>

        <div class="col-sm-6 text-right h-100 my-auto">
            <a onclick="event.preventDefault();addStudentForm();" href="#" class="btn btn-success my-auto" data-toggle="modal"><i class="fas fa-user-plus"></i><span> Add Student</span></a>
        </div>
    </div>
</div>