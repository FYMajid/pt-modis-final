import "./bootstrap";

import Alpine from "alpinejs";
import { newsManager } from "./news-manager";

window.Alpine = Alpine;
Alpine.data("newsManager", newsManager);

Alpine.start();
