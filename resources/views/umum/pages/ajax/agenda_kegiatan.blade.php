@foreach ($agenda_kegiatan as $item)
<tr>
    <td>{{ \Illuminate\Support\Str::limit($item->nama, 90) }}</td>
    <td>{{ $item->waktu }}</td>
    <td>{{ \Illuminate\Support\Str::limit($item->tempat, 75) }}</td>
    <td>{{ \Illuminate\Support\Str::limit($item->dihadiri_oleh, 80) }}</td>
</tr>
@endforeach
