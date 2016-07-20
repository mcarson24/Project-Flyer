<?php

namespace App\Http;

class Flash {

    /**
     * Create a flash message.
     * 
     * @param  string $title   
     * @param  string $message 
     * @param  string $level   
     * @param  string $type    
     * @return void
     */
    public function create($title, $message, $level, $type = 'flash_message')
    {
        return session()->flash($type, [
            'title'   => $title,
            'message' => $message,
            'level'   => $level
        ]);
    }
    /**
     * Create a default flash message.
     * 
     * @param  string $title   
     * @param  string $message 
     * @return void          
     */
    public function info($title, $message)
    {
        $this->create($title, $message, 'info');
    }

    /**
     * Create a success flash message.
     * 
     * @param  string $title   
     * @param  string $message 
     * @return void          
     */
    public function success($title, $message)
    {
        $this->create($title, $message, 'success');
    }

    /**
     * Create an flash error message.
     * 
     * @param  string $title   
     * @param  string $message 
     * @return void          
     */
    public function error($title, $message)
    {
        $this->create($title, $message, 'error');
    }

    /**
     * Create a flash overlay message.
     * 
     * @param  string $title   
     * @param  string $message 
     * @param  string $level   
     * @return void          
     */
    public function overlay($title, $message, $level = 'success')
    {
        $this->create($title, $message, $level, 'flash_message_overlay');
    }
}