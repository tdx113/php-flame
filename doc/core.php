<?php
/**
 * 基本框架流程函数, 用于框架初始化, 启动协程等;
 */
namespace flame;
/**
 * 初始化框架, 设置进程名称及相关配置;
 * @param string $process_name 进程名称
 * @param array  $options 选项配置, 目前可用如下:
 *  * `worker` - 工作进程仓库
 *  * `logger` - 日志输出重定向目标文件(完整路径);
 */
function init($process_name, $options = []) {}
/**
 *  启动协程(运行对应回调函数)
 */
function go(callable $cb) {}
/**
 * 框架调度, 上述协程会在框架开始调度运行后启动
 */
function run() {}
/**
 * 从若干个队列中选择(等待)一个有数据队列
 * @return 若所有通道已关闭, 返回 null; 否则返回一个有数据的通道, 即: 可以无等待 pop()
 */
function select(channel $q1, $q2, ...): {}
/**
 * 协程型队列
 */
class queue {
    /**
     * @param integer $max 队列容量, 若已放入数据达到此数量, push() 将"阻塞"(等待消费);
     */
    function __construct($max = 1) {}
    /**
     * 放入; 若向已关闭的队列放入, 将抛出异常;
     */
    function push($v) {}
    /**
     * 取出
     */
    function pop() {}
    /**
     * 关闭 (将唤醒阻塞在取出 pop() 的协程);
     * 原则上仅能在生产者方向关闭队列;
     */
    function close() {}
}