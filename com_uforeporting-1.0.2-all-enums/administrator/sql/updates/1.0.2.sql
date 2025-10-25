ALTER TABLE `#__ommp_domains` MODIFY `code` ENUM('F','M','C','E','S','A','O','H','D','I','G');
ALTER TABLE `#__ommp_domains` MODIFY `behavior` ENUM('H','L','E','I','R','P');
ALTER TABLE `#__ommp_domains` MODIFY `shape` ENUM('S','D','T','R','F','L','U','M','P','X');
ALTER TABLE `#__ommp_domains` MODIFY `minus_range` ENUM('<1200km radius','>2900km depth','>1km depth','Below sea level','>200m depth','<FL180','160–2000km','Corona','<1.5M km','100–1000AU','<100kly');
ALTER TABLE `#__ommp_domains` MODIFY `equal_range` ENUM('1200–3400km','70–2900km','100m–1km','0–1500m','40–200m','FL180–450','2000–35786km','Photosphere','1.5M km–3AU','0.01–1ly','100kly–10Mly');
ALTER TABLE `#__ommp_domains` MODIFY `plus_range` ENUM('>3400km','<70km','<100m','>1500m','<40m','>FL450','>35786km','Core direction','>3AU','>1ly','>10Mly');
