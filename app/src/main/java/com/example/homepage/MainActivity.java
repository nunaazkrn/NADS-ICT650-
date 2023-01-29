package com.example.homepage;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {

    private androidx.cardview.widget.CardView news_1,map_1,about_1,cright_1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        news_1 = (CardView) findViewById(R.id.news);
        map_1 = (CardView) findViewById(R.id.map);
        about_1 = (CardView) findViewById(R.id.about);
        cright_1 = (CardView) findViewById(R.id.copyright);

        news_1.setOnClickListener(this);
        map_1.setOnClickListener(this);
        about_1.setOnClickListener(this);
        cright_1.setOnClickListener(this);

        ActionBar actionBar = getSupportActionBar();
        if (actionBar != null){
            actionBar.setBackgroundDrawable(getResources().getDrawable(R.drawable.gradient));
        }

    }

    @Override
    public void onClick(View v) {
        Intent i;

        switch (v.getId()){
            case R.id.news:
                i = new Intent(this,news.class);
                startActivity(i);
                break;

            case R.id.map:
                i = new Intent(this,map.class);
                startActivity(i);
                break;

            case R.id.about:
                i = new Intent(this,about.class);
                startActivity(i);
                break;

            case R.id.copyright:
                i = new Intent(this,copyright.class);
                startActivity(i);
                break;
        }
    }
}