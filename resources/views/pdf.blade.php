<div>
    @foreach ($orderData as $key => $param)
        <table>
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $param }}</td>
            </tr>
        </table>
    @endforeach
</div>
<style>
    * {
        font-family: "DejaVu Sans", sans-serif;
    }

    .main-pdf {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .section {
        display: flex;
        justify-content: flex-start;
        color: red;
    }
</style>
