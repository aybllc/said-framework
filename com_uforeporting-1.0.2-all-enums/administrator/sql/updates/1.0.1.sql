-- Update to 1.0.1: convert ranges to ENUMs
ALTER TABLE `#__ommp_domains`
  MODIFY `minus_range` ENUM('<1200km radius','>2900km depth','>1km depth','Below sea level','>200m depth','<FL180','160–2000km','Corona','<1.5M km','100–1000AU','<100kly') NULL,
  MODIFY `equal_range` ENUM('1200–3400km','70–2900km','100m–1km','0–1500m','40–200m','FL180–450','2000–35786km','Photosphere','1.5M km–3AU','0.01–1ly','100kly–10Mly') NULL,
  MODIFY `plus_range`  ENUM('>3400km','<70km','<100m','>1500m','<40m','>FL450','>35786km','Core direction','>3AU','>1ly','>10Mly')  NULL;