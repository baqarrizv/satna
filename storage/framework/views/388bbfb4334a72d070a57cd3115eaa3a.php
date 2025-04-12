<?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="event-list">
        <div class="event-date text-primary"><?php echo e($activity->created_at->diffForHumans()); ?></div>
        <h5><?php echo e($activity->description); ?></h5>
        
        <?php
            $properties = $activity->properties->toArray();
        ?>
    
        <ul class="list-unstyled">
            <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(is_array($val)): ?>
                    <?php $__currentLoopData = $val; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <strong><?php echo e(ucfirst(str_replace('_', ' ', $k))); ?>:</strong>                    
                        <?php echo e($v); ?>                   
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                <?php else: ?>
                    <li>
                        <strong><?php echo e(ucfirst(str_replace('_', ' ', $key))); ?>:</strong>                    
                        <?php echo e($val); ?>                   
                    </li>
                <?php endif; ?>                    
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/user/htdocs/srv617279.hstgr.cloud/resources/views/activity_logs/partials/logs.blade.php ENDPATH**/ ?>