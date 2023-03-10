<?php
// Bắt đầu đo lường
$start_memory = memory_get_usage();

// Đoạn code PHP của bạn ở đây
// ...
for ($i=0; $i < 10; $i++) { 
    echo $i;
}
// Kết thúc đo lường
$end_memory = memory_get_usage();

// Tổng số bộ nhớ được sử dụng (đơn vị byte)
$memory_usage = $end_memory - $start_memory;

// Chuyển đổi sang đơn vị đọc được (    , MB, GB)
// $memory_usage_readable = round($memory_usage / 1024 / 1024, 2) . ' MB';
$memory_usage_kb = round($memory_usage / 1024, 2) . ' KB';
echo $memory_usage_kb.'/'.$memory_usage;
?>