<div class="p-6">
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Country</th>
                <th class="px-4 py-2 text-left">Concept</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($players as $player)
            <tr>
                @if(isset($editingPlayerId) && $player->id == $editingPlayerId)
                <form method="post" action="{{ url('players', $player->id) }}">
                    @csrf
                    @method('PUT')
                    <td class="border px-4 py-2"><input type="text" name="name" value="{{ $player->name }}" class="border rounded w-full px-3 py-2"></td>
                    <td class="border px-4 py-2"><input type="text" name="country" value="{{ $player->country }}" class="border rounded w-full px-3 py-2"></td>
                    <td class="border px-4 py-2">
                        <label><input type="radio" name="concept" value="singles" @if($player->concept === 'singles') checked @endif> Singles</label><br>
                        <label><input type="radio" name="concept" value="doubles" @if($player->concept === 'doubles') checked @endif> Doubles</label><br>
                        <label><input type="radio" name="concept" value="mixed doubles" @if($player->concept === 'mixed doubles') checked @endif> Mixed Doubles</label>
                    </td>
                    <td class="border inline-block px-4 py-2">
                        <button type="submit" class="font-semibold px-4 py-2 bg-green-500 text-white rounded">Save</button>
                        <a href="{{ url('players') }}" class="font-semibold px-4 py-2 bg-gray-500 text-white rounded">Cancel</a>
                    </td>
                </form>
                @else
                <td class="border px-4 py-2">{{ $player->name }}</td>
                <td class="border px-4 py-2">{{ $player->country }}</td>
                <td class="border px-4 py-2">{{ $player->concept }}</td>
                <td class="border flex justify-center px-4 py-2">
                    <a href="{{ route('players.edit', $player->id) }}" data-id="{{ $player->id }}" class="edit-button font-semibold px-4 py-2 bg-blue-500 text-indigo-700 rounded">
                        Edit
                    </a>

                    <form method="post" action="{{ url('players', $player->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-semibold px-4 py-2 bg-white text-red-500 rounded">
                            Delete
                        </button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>




<div id="modal" class="fixed z-10 inset-0 overflow-y-auto" style="display: none;">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay, show/hide based on modal state. -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- Modal -->
        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            <!-- Content will go here -->
            <div id="modal-content"></div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('.edit-button').click(function(e) {
            e.preventDefault();
            console.log('Edit button clicked');
            let url = $(this).attr('href');
            let playerId = $(this).data('id');
            $.get(url, {playerId: playerId}, function(data) {
                $('#modal-content').html(data);
                $('#modal').show();
            });
        });
    });
</script>