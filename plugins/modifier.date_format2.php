<?php
/**
 * @description:
 * @author Monk
 * @create: 7.2.2010
 * @update: $Id: modifier.date_format2.php 49 2014-01-07 21:14:32Z Monk $
 */

/**
 * Smarty date_format2 modifier plugin
 * Type:     modifier<br>
 * Name:     date_format<br>
 * Purpose:  format datestamps via strftime<br>
 * Input:<br>
 * - timestamp: input date string
 * - format: strftime format for output
 * - default_date: default date if $string is empty
 * - induce: �������� ��, �� ��������� ���
 * @param string
 * @param string
 * @param string
 * @return string|void
 */
function smarty_modifier_date_format2($timestamp, $format = 'd.m.Y', $defaultDate = '', $induce = false)
{
    if (!$timestamp || !is_numeric($timestamp)) {
        if (!$defaultDate || !is_int($defaultDate)) {
            $defaultDate = time();
        }
        $timestamp = $defaultDate;
    }

    $date = date($format, $timestamp);

    if (!$induce) {
        $date = str_replace(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], [
            '�����������',
            '�������',
            '�����',
            '�������',
            '�������',
            '�������',
            '�����������'
        ], $date);
        $date = str_replace([
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ], [
            '������',
            '�������',
            '����',
            '������',
            '���',
            '����',
            '����',
            '������',
            '��������',
            '�������',
            '������',
            '�������'
        ], $date);
    } else {
        $date = str_replace(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], [
            '������������',
            '��������',
            '�����',
            '��������',
            '�������',
            '�������',
            '�����������'
        ], $date);
        $date = str_replace([
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ], [
            '������',
            '�������',
            '�����',
            '������',
            '���',
            '����',
            '����',
            '�������',
            '��������',
            '�������',
            '������',
            '�������'
        ], $date);
    }

    return $date;
}
