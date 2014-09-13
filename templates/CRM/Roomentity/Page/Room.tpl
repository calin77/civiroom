<h3>List of rooms</h3>


{* display a table with the rooms *}
<table style="width:100%">
    <tr>
        <th>Nr.</th>
        <th>Room label</th>		
        <th>Room no</th>
        <th>Room floor</th>
        <th>Room ext</th>
    
    </tr>
    {foreach from=$room item=i}
        <tr>
            <td>{$i.id}</td>
            <td>{$i.label}</td>
            <td>{$i.room_no}</td>
            <td>{$i.floor}</td>
            <td>{$i.ext}</td>

        </tr>
    {/foreach}
</table>

