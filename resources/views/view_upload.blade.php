<!DOCTYPE html>
<html>
<head>
    <title>Laravel 6 - Upload Image dengan Ckeditor dan Mysql - ilmucoding.com</title>
</head>
<body>
  
    <h1>Laravel 6 - Upload Image dengan Ckeditor dan Mysql - ilmucoding.com</h1>
    @if(Session::get('success'))
    <p style="color:green">{{ Session::get('success') }}</p>
    @endif
    @if(!empty($errors->all())) 
        Whoops! Ada kesalahan saat input data, yaitu:
        <ul style="color:red"> 
        @foreach($errors->all() as $error) 
            <li>{{ $error }}</li> 
        @endforeach 
        </ul> 
    @endif
    <br>
    <form action="{{ route('upload.store') }}" method="post">
        @csrf
        Title: <input type="text" name="title" id="" placeholder="Title">
        <br>
        <br>
        Content:
        <textarea name="content"></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{ route('upload.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: '250px',
            width: '700px'
        });
    </script>
   
</body>
</html>