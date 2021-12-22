<div class="d-flex flex-column min-vh-100 justify-content-center align-items-center p-4 bg-light">
    <div class="container position-relative">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Sorry!</strong> invalid input.<br><br>
                <ul style="list-style-type:none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="row justify-content-center bg-white p-5 rounded">
            <div class="col-xl-6">
                <div class="text-center text-black">
                    <h1 class="mb-3">Generate Shorten Link!</h1>
                    <div class="row">
                        <div class="col">
                            <input wire:model="link_url" type="url" id="link_url" class="form-control form-control-lg" placeholder="Enter URL" aria-label="Generate Short Link">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary btn-lg" wire:click="store()">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center bg-white p-3 rounded">
            <div class="col-xl-9">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
       
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th>Short Link</th>
                            <th>Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shortLinks as $key => $row)
                            <tr>
                                <td style="text-align: center;">{{ $key+1 }}</td>
                                <td><a href="{{ route('view.link', $row->code) }}" target="_blank">{{ route('view.link', $row->code) }}</a></td>
                                <td>{{ $row->link }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
            Build with Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </div>
</div>
