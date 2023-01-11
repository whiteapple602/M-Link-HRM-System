<div class="form-group" >
    <div class="col-sm-8">
        <select name="user_id" class="form-control " onchange="show()">
            <?php
            $query = $this->db->get_where('user', array('department_id' => $department_id));
            if($query->num_rows() >0){
                $employee = $query->result_array();
            foreach ($employee as $row2):
                
            ?>
            <option value="<?php echo $row2['user_id'] ?>"><?php echo $row2['name']; ?></option>   
            <?php
            
            endforeach;
            }
            ?>
        </select>
    </div>
</div>


