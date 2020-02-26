<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Search github</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <h2 class=" text-center">Get github API data</h2>
            <div>
                <form action="/" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="search-value">Searched value</label>
                        <input type="text" class="form-control" placeholder="Enter your searched value" id="search-value" name="value" value="{{ $search }}">
                    </div>
                    <div class="form-group">
                        <label for="type">Search type:</label>
                        <select class="form-control" id="type" name="type">
                            <option value="repositories" @if($type=="repositories") selected @endif>repositories</option>
                            <option value="commits"  @if($type=="commits") selected @endif>commits</option>
                            <option value="code" @if($type=="code") selected @endif>code</option>
                            <option value="issues" @if($type=="issues") selected @endif>issues</option>
                            <option value="users" @if($type=="users") selected @endif>users</option>
                            <option value="topics" @if($type=="topics") selected @endif>topics</option>
                            <option value="labels"@if($type=="labels") selected @endif>labels</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form> 
            </div>
            <div class="mt-5">
                <h3>Api Response</h3>
                <textarea cols="100" rows="20" class="text">@if($response =='') empty response @else @foreach($response as $key=>$value){{ $key }} - {{ $value }}
 @endforeach
                       @endif
                </textarea>
            </div>
        </div>
    </body>
</html>
