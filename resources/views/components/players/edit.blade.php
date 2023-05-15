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
        <button type="submit" class="font-semibold px-4 py-2 bg-green-500 text-indigo-700 rounded">Save</button>
        <a href="{{ url('players') }}" class="font-semibold px-4 py-2 bg-gray-500 text-white rounded">Cancel</a>
    </td>
</form>
