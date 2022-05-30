@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('levels.create') }}" class="btn btn-success">Create Level</a>

        <div class="" style="width: 50%;margin: auto">
            @foreach ($levels as $level)
                <div class="d-flex">
                    <div
                        style="background-color: {{ $level->color }}; min-width: 30px; text-align:center;margin-right: 40px;">
                        {{ $level->level }}</div>
                    <div> - {{ $level->desc }}</div>
                </div>
            @endforeach
        </div>

        <hr style="color:#9abbf2">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <table class="table table-bordered" style="border-color: #9abbf2">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    @foreach ($skills as $skill)
                        <th class="vertical " scope="col">{{ $skill->skill_name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>

                        @foreach ($skills as $skill)
                            <th class="th-full">
                                <select id="selected" class="w-100 h-100" onchange="myFunction(this)">
                                    <?php $dcm = false; ?>
                                    @foreach ($skill_level as $skl)
                                        @if ($skl->user_id == $user->id && $skl->skills_id == $skill->id)
                                            @foreach ($levels as $level)
                                                @if ($level->id == $skl->level_id)
                                                    <option id="option{{ $level->level }}" value="{{ $level->level }}"
                                                        data-userid="{{ $user->id }}"
                                                        data-skillid="{{ $skill->id }}"
                                                        data-levelid={{ $level->id }}
                                                        style="background-color:{{ $level->color }}" selected>
                                                        {{ $level->level }}
                                                    </option>
                                                @else
                                                    <option id="option{{ $level->level }}" value="{{ $level->level }}"
                                                        data-userid="{{ $user->id }}"
                                                        data-skillid="{{ $skill->id }}"
                                                        data-levelid={{ $level->id }}
                                                        style="background-color:{{ $level->color }}">
                                                        {{ $level->level }}
                                                    </option>
                                                @endif
                                            @endforeach
                                            <?php $dcm = true; ?>
                                        @endif
                                    @endforeach
                                    @if (!$dcm)
                                        <option> -</option>
                                        @foreach ($levels as $level)
                                            <option id="option{{ $level->level }}" value="{{ $level->level }}"
                                                data-userid="{{ $user->id }}" data-skillid="{{ $skill->id }}"
                                                data-levelid={{ $level->id }}
                                                data-background="background-color: {{ $level->color }}"
                                                style="background-color: {{ $level->color }}">
                                                {{ $level->level }}</option>
                                        @endforeach
                                    @endif
                                    <i class="fa-solid fa-circle-caret-down"></i>
                                    {{-- @foreach ($levels as $level)
                                        <option id="option{{ $level->level }}" value="{{ $level->level }}"
                                            data-userid="{{ $user->id }}" data-skillid="{{ $skill->id }}"
                                            style="background-color: {{ $level->color }}">
                                            {{ $level->level }}</option>
                                    @endforeach --}}
                                </select>
                            </th>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>

    <form action="{{ route('skill-matrix.store') }}"  method="POST">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update skill level</h5>
                        <button type="button" onclick="dmm()" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Choose completion date</h3>
                        <br>
                        <br>
                        <div class="input-group input-daterange">
                            <input type="text" id="start" name="start_date" class="form-control text-left mr-2">
                            <label class="ml-3 form-control-placeholder" id="start-p" for="start">Start
                                Date</label>
                            <span class="fa fa-calendar" id="fa-1"></span>
                            @error('start_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" id="end" name="end_date" class="form-control text-left ml-2">
                            <label class="ml-3 form-control-placeholder" id="end-p" for="end">End Date</label>
                            <span class="fa fa-calendar" id="fa-2"></span>
                            @error('end_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div id="show-error" class="text-danger text-center" ></div>

                        <div class="mb-3">
                            <input id="lvUpdate" type="hidden" class="form-control" name="level_id">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <input id="userUpdate" type="hidden" class="form-control" name="user_id">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <input id="skillUpdate" type="hidden" class="form-control" name="skills_id">
                                            <div class="mb-3">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" onclick="dmm()" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" id="submit-form" onclick="validate(event)"
                                                    class="btn btn-primary">Enter</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    </form>
@endsection

@section('script')
    <script>
        function myFunction(e) {
            var x = e.value
            // console.log(e.options[e.selectedIndex].dataset.skillid)
            // console.log(e.options[e.selectedIndex].dataset.userid)
            // console.log(e.value)

            document.getElementById("lvUpdate").value = e.options[e.selectedIndex].dataset.levelid;
            document.getElementById("userUpdate").value = e.options[e.selectedIndex].dataset.userid;
            document.getElementById("skillUpdate").value = e.options[e.selectedIndex].dataset.skillid;


            var color = document.getElementById("option" + x).style.backgroundColor
            e.style.backgroundColor = color;
            $('#exampleModal').modal('show')
        }

        function dmm() {
            $('#exampleModal').modal('hide')
            $("input[type=text]").val("")
            location.reload();
        }

        let select = document.querySelectorAll("#selected");

        select.forEach(function(item) {
            // console.log(item.options[item.selectedIndex].style.backgroundColor)
            item.style.backgroundColor = item.options[item.selectedIndex].style.backgroundColor
        })

        // fix validate
        function validate(e) {
            if (document.getElementById("start").value.length == 0 && document.getElementById("end").value.length == 0) {
                e.preventDefault();
                document.getElementById('show-error').innerHTML = "Không được để trống ngày vui lòng chọn ngày "
                return false;
            }
        }
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $(document).on("click", ".btn-delete", function() {
                let formID = $(this).data("form");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(`#${formID}`).submit();
                    }
                })
            })
        })

        $(document).ready(function() {
            $('.input-daterange').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                calendarWeeks: true,
                clearBtn: true,
                disableTouchKeyboard: true
            });
        });

        $("document").ready(function() {
            setTimeout(function() {
                $(".alert-success").remove();
            }, 2000);
        });
    </script>
@endsection
