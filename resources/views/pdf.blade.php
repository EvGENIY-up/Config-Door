<div>
    @foreach ($orderData as $key => $param)
        <table>
            <tr>
                <td class="title">{{ $key }}</td>
                <td>{{ $param }}</td>
            </tr>
        </table>
    @endforeach
</div>
<style>
    * {
        font-family: "DejaVu Sans", sans-serif;
    }

    .title {
        font-size: 20px;
    }
</style>
