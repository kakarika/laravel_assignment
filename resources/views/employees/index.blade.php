@extends('layouts.master')

@section('content')
    <table class="table table-striped table-primary w-75 m-auto">
        <thead>
            <tr>
                <th> ID </th>
                <th> Name </th>
                <th> Salary</th>
                <th> Age </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result as $res)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $res->employee_name }}</td>
                    <td>{{ $res->employee_salary }}</td>
                    <td>{{ $res->employee_age }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
