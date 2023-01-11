<?php
$designation = $this->db->get_where('designation', array('department_id' => $department_id))->result_array();
foreach($designation as $row2): ?>
    <option value="<?php echo $row2['designation_id']; ?>">
        <?php echo $row2['name']; ?>
    </option>
<?php endforeach; ?>