@extends('Admin.layout.adminlayout')
@section('title', 'Qubeta || Admin')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h5 class="mb-4">{{$title}}</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile No.</th>
                            <th scope="col">Designation</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Experience</th>
                            <th scope="col">Date</th>
                            <th scope="col">Resume</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1; @endphp
                        @foreach ($careers as $career)
                        <tr>
                            <th scope="row">{{$count}}</th>
                            <td>{{$career->full_name}}</td>
                            <td>{{$career->email}}</td>
                            <td>{{$career->mobile}}</td>
                            <td>{{$career->designation}}</td>
                            <td>{{$career->job_title}}</td>
                            <td>{{$career->experience}} Years</td>
                            <td>{{$career->created_at->format('d-m-Y') }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm view-resume-btn" data-bs-toggle="modal" data-bs-target="#resumeModal" data-resume="{{ asset('resumes/' . $career->resume) }}">
                                <i class="fas fa-eye"></i></button>
                            </td>
                        </tr>
                        @php $count ++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="resumeModal" tabindex="-1" aria-labelledby="resumeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resumeModalLabel">Resume</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Display the PDF using an iframe -->
                <iframe id="resumeFrame" src="" width="100%" height="500px"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select all view-resume buttons
        var viewResumeButtons = document.querySelectorAll('.view-resume-btn');

        // Add click event listener to each button
        viewResumeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Get the resume URL from the data-resume attribute
                var resumeUrl = button.getAttribute('data-resume');

                // Set the src of the iframe to display the PDF
                document.getElementById('resumeFrame').src = resumeUrl;
            });
        });
    });
</script>
@endsection