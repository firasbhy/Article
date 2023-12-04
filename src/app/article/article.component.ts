import { Component, OnInit } from '@angular/core';
import { ArticleServiceService } from '../Services/article-service.service';
import { Article } from '../Models/Article';

@Component({
  selector: 'app-article',
  templateUrl: './article.component.html',
  styleUrls: ['./article.component.css']
})
export class ArticleComponent implements OnInit {
articles: Article[]= [];

  constructor(private  articleservice:ArticleServiceService) { }

  ngOnInit(): void {
    this.articleservice.getData().subscribe((data: Article[]) => {this.articles= data; });
  }

}
