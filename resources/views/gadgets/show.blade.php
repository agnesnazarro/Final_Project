<x-app-layout>
    <div class="container">
        <h1>Gadget Details</h1>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $gadget->id }}</td>
            </tr>
            <tr>
                <th>Brand Name</th>
                <td>{{ $gadget->brand_name }}</td>
            </tr>
            <tr>
                <th>Gadget Name</th>
                <td>{{ $gadget->gadget_name }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $gadget->category }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $gadget->description }}</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td>{{ $gadget->quantity }}</td>
            </tr>
            <tr>
                <th>Purchase Date</th>
                <td>{{ $gadget->purchase_date }}</td>
            </tr>
        </table>
        <a href="{{ route('gadgets.index') }}" class="btn btn-primary">Back to List</a>
        <a href="{{ route('gadgets.edit', $gadgets->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('gadgets.destroy', $gadgets->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
</x-app-layout>
