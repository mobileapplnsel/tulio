<?php

namespace App\Observers;

use App\Models\ProjectRoomProduct;

class ProjectObserver
{
    /**
     * Handle the ProjectRoomProduct "created" event.
     *
     * @param  \App\Models\ProjectRoomProduct  $projectRoomProduct
     * @return void
     */
    public function created(ProjectRoomProduct $projectRoomProduct)
    {
        $projectRoomProduct->room->budget = $projectRoomProduct->room->products()->sum('price');
        $projectRoomProduct->room->save();
        $projectRoomProduct->room->project->budget = $projectRoomProduct->room->project->rooms()
        ->whereNull('room_id')->get()->sum(function($room){
            if($room->options){
                return max($room->options->max('budget'), $room->budget);
            }
            return $room->budget;
        });
        $projectRoomProduct->room->project->save();
    }

    /**
     * Handle the ProjectRoomProduct "deleting" event.
     *
     * @param  \App\Models\ProjectRoomProduct  $projectRoomProduct
     * @return void
     */
    public function deleting(ProjectRoomProduct $projectRoomProduct)
    {
        $projectRoomProduct->room->budget = $projectRoomProduct->room->products()->where('id','!=',$projectRoomProduct->id)->sum('price');
        $projectRoomProduct->room->save();
        $projectRoomProduct->room->project->budget = $projectRoomProduct->room->project->rooms()
        ->whereNull('room_id')->get()->sum(function($room){
            if($room->options){
                return max($room->options->max('budget'), $room->budget);
            }
            return $room->budget;
        });
        $projectRoomProduct->room->project->save();
    }
}
