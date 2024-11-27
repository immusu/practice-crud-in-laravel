<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

    <style type="text/tailwindcss">
    @layer utilities {
      .container{
        @apply px-10 mx-10;
      }
    }
  </style>

    <title>Create Page</title>
</head>
<body>
    <div class="container">
        <div class="flex justify-between my-5">
            <h2 class="text-red-500 text-xl">CREATE</h2>
            <a href="/" class="bg-green-600 text-white rounded px-5 py-5">Back to Home</a>
        </div>

        <div>
            <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-5">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{old('name')}}">
                    @error('name')
                        <p class="text-red-600">{{$message}}</p>
                    @enderror
                    
                    <label for="">description</label>
                    <input type="text" name="description" value="{{old('description')}}">
                    @error('description')
                        <p class="text-red-600">{{$message}}</p>
                    @enderror
                    
                    <label for="">Image</label>
                    <input type="file" name="image" id="">
                <div>
                <input type="submit" class="bg-green-500 text-white rounded py-3 px-3 inline block">
                </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>