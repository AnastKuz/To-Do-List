@extends('layouts.app')

@section('content')

{{--Card for adding a new task--}}
    <div class="container">
        <div class="card mt-5 col-6 mx-auto bg-info">
            <div class="card-body">
                <h5 class="card-title text-center">
                    Create a new task
                </h5>
                <hr>
                @include('common.errors')
                <form action="{{ url('task')}}" method="POST" class="mt-4 mb-3 d-flex offset-2">
                    @csrf
                    {{--Naming new task--}}
                    <div class="form-group col-8 d-flex">
                        <lable for="task-name" class="col-form-label font-weight-bold mr-3">Task</lable>
                        <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                    </div>
                    {{--Button--}}
                    <div class="form-group">
                        <div class="col">
                            <button type="submit" class="btn btn-outline-dark">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{--A list of tasks--}}

        @if (count($tasks) > 0)
            <div class="card mt-5 col-8 mx-auto">
                <div class="card-body">
                    <div class="card-title font-weight-bold text-center">
                        Current Tasks
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                        </thead>
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="col-4"><div>{{ $task->name }}</div></td>
                                {{--Delete Button--}}
                                <td class="ml-auto col-1">
                                    <form action="{{ url('task/'.$task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>




@endsection
