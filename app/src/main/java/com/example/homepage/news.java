package com.example.homepage;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.os.AsyncTask;
import android.os.Bundle;
import android.text.Html;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.gson.JsonObject;

import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URI;
import java.net.URL;
import java.sql.Connection;
import java.util.ArrayList;
import java.util.List;


public class news extends AppCompatActivity {

    ListView listView;
    ArrayAdapter<String> adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_news);
        ActionBar actionBar = getSupportActionBar();
        if (actionBar != null){
            actionBar.setBackgroundDrawable(getResources().getDrawable(R.drawable.gradient));
        }

        listView = (ListView) findViewById(R.id.listView);
        adapter = new ArrayAdapter<String>(this, android.R.layout.simple_list_item_1);
        listView.setAdapter(adapter);
        new Connection().execute();
    }
        class Connection extends AsyncTask<String, String, String>{


            @Override
            protected String doInBackground(String... strings) {
                String result = "";

                String host = "http://192.168.43.213/hazard/api.php";
                try{
                    HttpClient client = new DefaultHttpClient();
                    HttpGet request = new HttpGet();
                    request.setURI(new URI(host));
                    HttpResponse response = client.execute(request);
                    BufferedReader reader = new BufferedReader(new InputStreamReader(response.getEntity().getContent()));

                    StringBuffer stringBuffer = new StringBuffer("");

                    String line = "";
                    while ((line = reader.readLine()) != null){
                        stringBuffer.append(line);
                        break;
                    }
                    reader.close();
                    result = stringBuffer.toString();

                }
                catch (Exception e){
                    return new String("There exception: " + e.getMessage());
                }

                return result;
            }
            @Override
            protected void onPostExecute(String result){
                //parsing json data here
                try {
                    JSONObject jsonResult = new JSONObject(result);
                    int success = jsonResult.getInt("success");
                    if (success == 1){
                        JSONArray hazard = jsonResult.getJSONArray("hazard");
                        for (int i=0; i < hazard.length(); i++){
                            JSONObject haz = hazard.getJSONObject(i);
                            int id = haz.getInt("hz_id");
                            String location = haz.getString("hz_location");
                            String state = haz.getString("hz_state");
                            String repname = haz.getString("hz_repname");
                            String type = haz.getString("hz_type");
                            String desc = haz.getString("hz_desc");
                            String time = haz.getString("hz_time");
                            String dt = haz.getString("hz_date");
                            String line = "----- "+ desc + " -----\n" +
                                            "Location: "+ location + "\nState: " + state + "\n" +
                                            "Reported By: "+ repname+ "\n"+
                                            "Date: "+ dt + "\n"+
                                            "Time: "+ time + "\n";

                            adapter.add(line);
                        }
                    }
                    else {
                        Toast.makeText(getApplicationContext(), "NO NEW HAZARD REPORTED", Toast.LENGTH_SHORT).show();
                    }

                } catch (JSONException e) {
                    Toast.makeText(getApplicationContext(), e.getMessage(), Toast.LENGTH_SHORT).show();
                }

            }
        }
}