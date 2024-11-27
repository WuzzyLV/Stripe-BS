<?php
function formatDateWithHour($date) {
    return date('d.m.y H:i', strtotime($date));
}

function formatDateWithoutHour($date) {
    return date('d.m.y', strtotime($date));
}