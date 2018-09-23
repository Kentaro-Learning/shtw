    <div class="text-center">
        <h2>敵の編成を指定して勝ち編成を検索</h2>
    </div>
    
    {!! Form::open(['route' => 'result']) !!}
        <ul class="image_list">
        <p>前衛</p>
        
        
        @foreach ($characters as $character)
        
            @if ($character->position == 1)
                <li>    
                    <div class="image_box form-group" >
                        <label>
                        <img class="thumbnail" src="{{ secure_asset($character->image) }}">
                        {{Form::checkbox('enemy_id[]', $character->id, null, ['class' => 'disabled_checkbox'])}}
                        {{$character->name}}</label>
                    </div>  
                </li> 
            @endif
          
        @endforeach
           
        
        <p>中衛</p>
        @foreach ($characters as $character)
            @if ($character->position == 2)
                {!! Form::label('name', $character->name) !!}
                {{Form::checkbox('enemy_id[]', $character->id)}}
            @endif
        @endforeach
        <p>後衛</p>
        @foreach ($characters as $character)
            @if ($character->position == 3)
                {!! Form::label('name', $character->name) !!}
                {{Form::checkbox('enemy_id[]', $character->id)}}
            @endif
        @endforeach
        <div class="form-group">
            <?php $today = \Carbon\Carbon::now(); ?>
            {!! Form::label('date', '日付') !!}
            {{Form::selectRange('year', 2015, 2018, $today->year)}}年
            {{Form::selectRange('month', 1, 12, $today->month)}}月
            {{Form::selectRange('day', 1, 31, $today->day)}}日
        </div>

        {!! Form::submit('勝てる編成を検索', ['class' => 'btn btn-primary btn-block']) !!}
        </ul>
    <script src="./js/base.js"></script>    
    {!! Form::close() !!}    
