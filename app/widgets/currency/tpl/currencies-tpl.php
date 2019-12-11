<option value="" selected><b><?=$this->currency['code'];?></b></option>
<?php
foreach($this->currencies as $k => $v):
    if($k != $this->currency['code']): ?>
        <option value="<?=$k;?>"><?=$k;?></option>
<?php endif;
endforeach; ?>
