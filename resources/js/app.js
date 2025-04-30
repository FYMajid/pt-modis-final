import "./bootstrap";

import Alpine from "alpinejs";
import { newsManager } from "./news-manager";
import { careerManager } from "./careers-manager";

window.Alpine = Alpine;
Alpine.data("newsManager", newsManager);
Alpine.data("careerManager", careerManager);

Alpine.start();
