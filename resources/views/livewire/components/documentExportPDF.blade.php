<table style='width:100%;border:1px solid black'>
    <thead>
    <tr style='border:1px solid black'>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Document</th>
    </tr>
    </thead>
    <tbody>
    @if (count($document))
        @foreach ($document as $document)
            <tr style='border:1px solid black'>
                <td style='border:1px solid black;text-align:center;'>{{ $document->id }}</td>
                <td style='border:1px solid black;text-align:center;'> {{ $document->title }} </td>
                <td style='border:1px solid black;text-align:center;'> {{ $document->description }} </td>
                <td style='border:1px solid black;text-align:center;'> <a href="http://docs.google.com/gview?url={{ URL::to( public_path('storage\\') . $document->document) }}" target="_blank">{{$document->title}}</a> </td>

                <td style='border:1px solid black;text-align:center;'>{{ $document->users->fname }}
                    {{ $document->users->lname }}</td>

            </tr>
        @endforeach
    @else
        <h4>Record Not Found</h4>
    @endif

    </tbody>
</table>
