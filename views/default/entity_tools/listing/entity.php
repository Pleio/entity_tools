<?php

$entity = elgg_extract("entity", $vars);
if (empty($entity) || !elgg_instanceof($entity)) {
	return;
}

$container_options = entity_tools_get_container_options($entity);

echo "<tr>";
echo "<td>" . elgg_view("output/url", array(
	"text" => elgg_get_excerpt($entity->title, 30),
	"title" => $entity->title,
	"href" => $entity->getURL()
)) . "</td>";
echo "<td>" . elgg_view("input/datetimepicker", array(
	"name" => "params[" . $entity->getGUID() . "][time_created]",
	"value" => $entity->time_created,
	"timestamp" => true,
	"readonly" => true
)) . "</td>";
echo "<td>" . elgg_view("input/userpicker", array(
	"name" => "params[" . $entity->getGUID() . "][owner_guid]",
	"values" => $entity->getOwnerGUID(),
	"limit" => 1
)) . "</td>";
echo "<td>" . elgg_view("input/dropdown_label", array(
	"name" => "params[" . $entity->getGUID() . "][container_guid]",
	"value" => $entity->getContainerGUID(),
	"options_values" => $container_options
)) . "</td>";
echo "</tr>";
